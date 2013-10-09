<?php

namespace KsUtils\Validator;

/**
 * Description of Date
 *
 * @author kostya
 */
class Date extends \KsUtils\Validator
{
    protected $format;

    public function __construct($format = "Y-m-d")
    {
        $this->format = $format;
    }

    public function check($value)
    {
        /*echo "<pre>";
        var_dump($value);
        die;*/
        $dtObj = date_create_from_format($this->format, $value);

        return $dtObj !== false;
    }

    public function getErrorMessage($errValue)
    {
        return "Неверный формат даты";
    }
}
