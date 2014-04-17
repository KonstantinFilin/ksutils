<?php

namespace KsUtils\Validator;

/**
 * String range validator
 */
class StrLenRange extends \KsUtils\Validator
{
    /**
     * Minimum string length
     * @var int
     */
    protected $min;

    /**
     * Maximum string length
     * @var int
     */
    protected $max;

    /**
     * Class contructor
     * @param integer $min Minimum string length
     * @param integer $max Maximum string length
     */
    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;

        $errMes = sprintf(
            "Must be string with length between %d and %d chars, checked value: %%s",
            $this->min,
            $this->max
        );

        $this->setErrorTpl($errMes);
    }

    /**
     * @inheritdoc
     */
    protected function hasError($value)
    {
        if (!is_string($value)) {
            return true;
        }

        $len = strlen($value);

        return $len < $this->min || $len > $this->max;
    }
}
