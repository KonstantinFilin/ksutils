<?php

namespace KsUtils\StrFilter;

/**
 * Filters all non digits
 */
class StripNonDigit implements \KsUtils\StrFilter
{
    /**
     * Returns only digits from source string
     * @param  string $str Source string
     * @return string Filtered string
     */
    public function filter($str)
    {
        return preg_replace("/[\D]+/", "", $str);
    }
}
