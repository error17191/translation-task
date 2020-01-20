<?php

namespace App;

class  LanguageDetector
{
    private $detector;

    public function detect($name)
    {
        if (mb_strlen($name) == strlen($name)) {
            return 'en';
        }

        return 'ar';
    }
}