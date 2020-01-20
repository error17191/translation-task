<?php


namespace App;


class NameUtility
{
    public static function titleCase($name)
    {
        return ucwords(strtolower($name));
    }

    public static function withoutDigitsAtEnd($name)
    {
        return trim(preg_replace('/\d+$/', '', $name));
    }

    public static function replaceThisPart($part, $replacement, $name)
    {
        return str_replace($part, $replacement, $name);
    }

    public static function isOnlyDigits($name)
    {
        return preg_match('/^[0-9\-\+\s]+$/', $name);
    }

    public static function isOnlySpecialChars($name)
    {
        return preg_match('/^[\W_]+$/', $name);
    }

    public static function replaceHindiNumbers($name)
    {
        $hindi = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
        $numbers = [9, 8, 7, 6, 5, 4, 3, 2, 1];
        return str_replace($hindi, $numbers, $name);
    }
}