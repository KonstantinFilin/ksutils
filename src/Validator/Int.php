<?php

namespace KsUtils\Validator;

/**
 * Description of UInt
 *
 * @author kostya
 */
class Int extends \KsUtils\Validator
{
    protected $min;
    protected $max;

    public function __construct($min = 1, $max = 1000000)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function check($value)
    {
        $val = intval($value);

        return $val && $val > 0;
    }

    public function getErrorMessage($errValue)
    {
        return "Требуется ввести целое положительное число";
    }
}
