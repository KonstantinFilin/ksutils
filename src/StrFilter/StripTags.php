<?php

    namespace KsUtils\StrFilter;

    /**
     * Description of StripTags
     *
     * @author ksf
     */
    class StripTags implements \KsUtils\StrFilter
    {
        public function filter($str)
        {
            if(is_array($str)) {
                foreach($str as $k=>$v) {
                    $str[$k] = strip_tags($v);
                }

                return $str;
            }

            return strip_tags($str);
        }
    }

?>
