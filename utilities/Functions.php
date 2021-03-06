<?php


class Functions
{

    public static function sanitizeParameter($query)
    {
        $query = htmlentities($query);
        $query = str_replace("%", "", $query);
        return $query;
    }

    public static function encodeWithSha512($text)
    {
        return hash('sha512', $text);
    }

    public static function isParameterValid($parameter)
    {
        $query = htmlentities($parameter);
        $query = str_replace("%", "", $query);
        return $query !== "";

    }

    public static function formatDate(string $date): string
    {
        $timestamp = strtotime($date);
        if (date('Ymd') == date('Ymd', $timestamp)) {
            return "Today " . date('H:i');
        } else {
            return date("d-m-Y");
        }
    }
}

?>