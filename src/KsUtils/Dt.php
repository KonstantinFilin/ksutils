<?php

namespace KsUtils;

/**
 * Date and time utils
 */
class Dt
{
    /**
     * Converts date string from one format to another, f.e.
     * 31.12.2013 <-> 2013-12-31
     * @param  sting       $str       Input date string
     * @param  string      $formatIn  Format of input date string
     * @param  string      $formatOut Format of output date string
     * @return string|null Output date string or null if error
     */
    public static function convert($str, $formatIn, $formatOut)
    {
        if (!$str) {
            return null;
        }

        $date = \DateTime::createFromFormat($formatIn, $str);

        if (!$date) {
            return null;
        }

        return $date->format($formatOut);
    }

    /**
     * Converts date string from format 31.12.2013 to format 2013-12-31.
     * Shortcat for convert(...) method.
     * @param  sting       $str       Input date string
     * @param  string      $formatIn  Format of input date string
     * @param  string      $formatOut Format of output date string
     * @return string|null Output date string or null if error
     */
    public static function rus2int($str, $formatIn = "d.m.Y", $formatOut = "Y-m-d")
    {
        return self::convert($str, $formatIn, $formatOut);
    }

    /**
     * Converts date string from format 2013-12-31 to format 31.12.2013.
     * Shortcat for convert(...) method.
     * @param  sting       $dtStr     Input date string
     * @param  string      $formatIn  Format of input date string
     * @param  string      $formatOut Format of output date string
     * @return string|null Output date string or null if error
     */
    public static function int2rus($dtStr, $formatIn = "Y-m-d", $formatOut = "d.m.Y")
    {
        return self::convert($dtStr, $formatIn, $formatOut);
    }
}
