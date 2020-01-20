<?php

namespace App;

use Google\Cloud\Translate\V2\TranslateClient;
use MysqliDb;
use App\LanguageDetector;
use App\NameUtility as NU;

class NamesFeeder
{
    private $db;
    private $translator;
    private $detector;
    private $map;
    private $mapCounter;

    public function __construct(MysqliDb $db)
    {
        $this->db = $db;
        $this->translator = new TranslateClient();
        $this->detector = new LanguageDetector();
    }

    public function batchInput($names, $hits)
    {
        $this->map = [];
        $this->mapCounter = 0;
        foreach ($names as $index => $name) {
            $name = trim($name);
            if (!$name) {
                continue;
            }
            // Here we ignore names that are composed of only special characters
            // We can make more tweaks like this after studying the requirements more carefully
            // to discard values that are not worth translating. Like for example skipping Emails
            if (NU::isOnlySpecialChars($name)) {
                continue;
            }
            if (NU::isOnlyDigits($name)) {
                continue;
            }

            $name = NU::titleCase(
                NU::withoutDigitsAtEnd($name)
            );

            if ($record = $this->findRecordContains($name)) {
                $this->incrementHits($record['id'], $record['path']);
                continue;
            }
            $source = $this->detector->detect($name);
            if (!isset($this->map[$name])) {
                $this->map[$name] = [
                    'name' => $name,
                    'lang' => $source,
                    'hits' => $hits[$index],
                    'translations' => [],
                    'index' => $this->mapCounter++,
                ];
            } else {
                $this->map[$name]['hits'] += $hits[$index];
            }
        }
        $this->addTranslationsToMap($this->translateEnglishNames());
        $this->addTranslationsToMap($this->translateArabicNames());
        $this->saveTranslationsToDB();
    }

    private function first(&$list)
    {
        foreach ($list as $item) {
            return $item;
        }
    }

    private function findRecordContains($name)
    {
        $results = $this->db->rawQuery('
                            SELECT id, JSON_SEARCH(UPPER(names),?,UPPER(?) ) as path 
                            from translations
                            WHERE JSON_CONTAINS(UPPER(names), UPPER(?))
                               LIMIT 1', ['one', "{$name}", "\"{$name}\""]);

        return $this->first($results);
    }

    private function incrementHits($id, $path)
    {
        $this->db->rawQuery(
            'UPDATE translations
            SET hits = JSON_SET(hits, ? , JSON_EXTRACT(hits , ?) + 1)
            WHERE id = ? 
            ', [$path, $path, $id]);
    }

    private function translateEnglishNames()
    {
        return $this->translateFrom('en');
    }

    private function translateArabicNames()
    {
        return $this->translateFrom('ar');
    }

    private function translateFrom($lang)
    {
        $names = [];
        foreach ($this->map as $name => $details) {
            if ($details['lang'] == $lang && count($details['translations']) == 0) {
                $names[] = $name;
            }
        }
        if (count($names) == 0) {
            return [];
        }
        $from = $lang;
        $to = $from == 'en' ? 'ar' : 'en';
        $translations = $this->translator->translateBatch($names, [
            'source' => $from,
            'target' => $to
        ]);
        return $translations;
    }


    private function extractTranslationText($translations)
    {
        $translationsText = [];
        foreach ($translations as $translation) {
            $translationsText[] = $translation['text'];
        }

        return $translationsText;
    }

    private function addTranslationsToMap($translations)
    {
        foreach ($translations as $details) {
            $input = $details['input'];
            $translation = NU::titleCase($details['text']);
            if (isset($this->map[$translation])) { // translation already exists
                $this->map[$translation]['translations'][] = $this->map[$input]['index'];
            } else {
                $this->map[$translation] = [
                    'name' => $translation,
                    'lang' => $details['source'] == 'en' ? 'ar' : 'en',
                    'hits' => 1,
                    'translations' => [
                        $this->map[$input]['index']
                    ],
                    'index' => $this->mapCounter++,
                ];
            }
            $this->map[$input]['translations'][] = $this->map[$translation]['index'];
            $this->map[$translation]['hits']++;
        }

    }

    private function saveTranslationsToDB()
    {
        if (count($this->map) == 0) {
            return;
        }
        $names = [];
        $hits = [];
        $translations = [];
        foreach ($this->map as $name => $details) {
            $names[] = $name;
            $hits[] = $details['hits'];
            $translations[] = $details['translations'];
        }

        $this->db->insert('translations', [
            'names' => $this->encode($names),
            'hits' => $this->encode($hits),
            'translations' => $this->encode($translations)
        ]);
    }

    private function encode($data)
    {
        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}

