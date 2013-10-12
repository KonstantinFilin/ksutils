<?php

    namespace KsUtils\StrFilter;

/**
 * Filter for the phone number
 *
 * @author kostya
 */
class Phone implements \KsUtils\StrFilter
{
    /**
     * Returns only digits from source string. If string is
     * 11 chars length and first char is 7 then that char is stripped
     * @param string $str Source string
     * @return string Filtered string
     */
    public function filter($str)
    {
        $str = preg_replace("|[\D+]|", "", $str);

        if (strlen($str) == 11 && in_array(substr($str, 0, 1), array("7", "8"))) {
            $str = substr($str, 1);
        }

        $len2 = strlen($str);

        return $len2 == 10 ? $str : "";
    }
}
