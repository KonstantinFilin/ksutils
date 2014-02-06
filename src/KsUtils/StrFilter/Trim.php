<?php

namespace KsUtils\StrFilter;

/**
 * Filter for stripping trailing whitespaces
 *
 * @author ksf
 */
class Trim implements \KsUtils\StrFilter
{
    /**
     * Strips all trailing whitespaces
     * @param  string|array $str Source string
     * @return string       Fiiltered string
     */
    public function filter($str)
    {
        if (is_null($str)) {
            return null;
        }

        if (is_array($str)) {
            foreach ($str as $k => $v) {
                $str[$k] = trim($v);
            }

            return $str;
        }

        return trim($str);
    }
}
