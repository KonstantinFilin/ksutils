<?php

namespace KsUtils\Validator;

/**
 * Description of Required
 *
 * @author kostya
 */
class NotEmpty extends \KsUtils\Validator
{
    public function check($value)
    {
        return !is_null($value) && trim($value) !== "";
    }

    public function getErrorMessage($errValue)
    {
        return "Не может быть пустым";
    }
}
