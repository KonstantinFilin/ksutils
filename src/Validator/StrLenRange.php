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
            "String length must be  between %d and %d, checked value: %%s",
            $this->min,
            $this->max
        );
    }

    /**
     * @inheritdoc
     */
    public function check($value)
    {
        $len = strlen($value);

        return $len >= $this->min && $len <= $this->max;
    }
}
