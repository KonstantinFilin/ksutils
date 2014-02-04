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

    public function __construct($min = 1, $max = 1000000)
    {
        $this->min = $min;
        $this->max = $max;
        $this->error = sprintf(
            "Must be a number between %d and %d, checked value: %%s",
            $this->min,
            $this->max
        );
    }

    /**
     * @inheritdoc
     */
    public function check($value)
    {
        $val = intval($value);
        return preg_match("|^-?\d+$|", $value) && $val >= $this->min && $val <= $this->max;
    }
}
