<?php

    namespace KsUtils\StrFilter;
    
/**
 * Description of Phone
 *
 * @author kostya
 */
class Phone implements \KsUtils\StrFilter
{
    public function filter($str) 
    {
        $str = preg_replace("|[^\D]|", "", $str);
        
        if(strlen($str) == 11 && substr($str, 0, 1) == 7) {
            $str = substr($str, 1);
        }
        
        return $str;
    }
}

?>
