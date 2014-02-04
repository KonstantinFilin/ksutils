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

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;

        $this->error = sprintf(
            "Must be string with length between %d and %d chars, checked value: %%s",
            $this->min,
            $this->max
        );
    }

    /**
     * @inheritdoc
     */
    public function check($value)
    {
        if(!is_string($value)) {
            return false;
        }

        $len = strlen($value);
        return $len >= $this->min && $len <= $this->max;
    }
}
