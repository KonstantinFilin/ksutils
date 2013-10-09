<?php

namespace KsUtils\StrFilter;
/**
 * Filter for the date string in russian format
 *
 * @author kostya
 */
class DtFromRus implements \KsUtils\StrFilter
{
    /**
     * Filters date string in format d.m.Y. For others string returns "".
     * @param string $str Source string
     * @return string Filtered string
     */
    public function filter($str)
    {
        $dtObj = date_create_from_format("d.m.Y", $str);

        if (!$dtObj) {
            return "";
        }

        return $dtObj->format("Y-m-d");
    }
}
