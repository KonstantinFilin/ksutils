<?php

namespace KsUtils\StrFilter;
/**
 * Description of DtFromRus
 *
 * @author kostya
 */
class DtFromRus implements \KsUtils\StrFilter
{
    public function filter($str)
    {
        $dtObj = date_create_from_format("d.m.Y", $str);

        if (!$dtObj) {
            return "";
        }

        return $dtObj->format("Y-m-d");
    }
}
