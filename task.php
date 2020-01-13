<?php

require_once 'vendor/autoload.php';

use Stichoza\GoogleTranslate\GoogleTranslate;

// initialize env & config
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = require __DIR__ . '/config.php';

$translator = new GoogleTranslate();

$db = new MysqliDb($config['mysql']);

// not optimized for large tables
$translations = $db->get('translations');

foreach ($translations as $translation) {
    $names = json_decode($translation['names']);
    $hits = json_decode($translation['hits']);
    $map = array_flip($names);
    foreach ($names as $index => $name) {
        $expected_source = is_english($name) ? 'en' : 'ar';
        $translator->setSource($expected_source);
        $translator->setTarget($expected_source == 'en' ? 'ar' : 'en');
        $translated = $translator->translate($name);
        $actual_source = $translator->getLastDetectedSource();
        if ($expected_source != $actual_source) { // if the expected is not the detected by the translator
            $translator->setSource($actual_source);
            $translator->setTarget($actual_source == 'en' ? 'ar' : 'en');
            $translated = $translator->translate($name);
        }

        if (isset($map[$translated])) { // this translation was fetched before
            $hits[$map[$translated]]++;
        } else {
            $names[] = $translated;
            $hits[] = 1;
        }
    }

    $db->where('id', $translation['id']);
    $db->update('translations', [
        'names' => json_encode($names, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        'hits' => json_encode($hits, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
    ]);
}


// a helper function used to expect if the language used is non english to reduce the requests
function is_english($text)
{
    return strlen($text) == strlen(utf8_decode($text));
}
