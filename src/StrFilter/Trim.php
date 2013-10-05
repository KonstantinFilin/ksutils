<?php

    namespace KsUtils\StrFilter;
    
    /**
     * Description of Trim
     *
     * @author ksf
     */
    class Trim implements \KsUtils\StrFilter
    {
        public function filter($str)
        {
            if(is_null($str)) {
                return null;
            }
            
            if(is_array($str)) {
                foreach($str as $k=>$v) {
                    $str[$k] = trim($v);
                }

                return $str;
            }

            return trim($str);
        }
    }

?>
