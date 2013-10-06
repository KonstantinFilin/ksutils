<?php

    namespace KsUtils\StrFilter;

    /**
     * Description of TrimNonDigit
     *
     * @author ksf
     */
    class StripNonDigit implements \KsUtils\StrFilter
    {
        public function filter($str)
        {
            return preg_replace("/[\D]+/", "", $str);
        }
    }
