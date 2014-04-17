<?php

namespace KsUtils\Validator;

/**
 * Integer number validator
 */
class Int extends \KsUtils\Validator
{
    /**
     * Minimum range value
     * @var int
     */
    protected $min;

    /**
     * Maximum range value
     * @var int
     */
    protected $max;

    /**
     * Class constructor
     * @param integer $min Minimum available value
     * @param integer $max Maximum available value
     */
    public function __construct($min = 1, $max = 1000000)
    {
        $this->min = $min;
        $this->max = $max;
        $errorMes = sprintf(
            "Must be a number between %d and %d, checked value: %%s",
            $this->min,
            $this->max
        );

        $this->setErrorTpl($errorMes);
    }

    /**
     * @inheritdoc
     */
    protected function hasError($value)
    {
        return !(preg_match("|^-?\d+$|", $value) && $value >= $this->min && $value <= $this->max);
    }
}
