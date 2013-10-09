<?php

namespace KsUtils\StrFilter;

/**
 * Filter for stripping html tags from string
 */
class StripTags implements \KsUtils\StrFilter
{
    /**
     * Clears html tags from source string
     * @param string|array $str Source string
     * @return string Filtered string
     */
    public function filter($str)
    {
        if (is_array($str)) {
            foreach ($str as $k=>$v) {
                $str[$k] = strip_tags($v);
            }

            return $str;
        }

        return strip_tags($str);
    }
}
