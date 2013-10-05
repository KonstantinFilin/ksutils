<?php

namespace KsUtils\Validator;

/**
 * Description of Phone
 *
 * @author kostya
 */
class Phone extends \KsUtils\Validator
{
    public function getErrorMessage($errValue) 
    {
        return "Неверный телефонный номер";
    }

    public function check($value) 
    {
        $len = strlen($value);
        return is_integer((int) $value) 
                && ($len == 10 || $len == 7);
    }
}

?>
