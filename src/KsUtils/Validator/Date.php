<?php

namespace KsUtils\Validator;

/**
 * Validator for a date string in different format
 */
class Date extends \KsUtils\Validator
{
    /**
     * Format of the date
     * @var string
     */
    protected $format;

    /**
     * @param string $format Format of the date
     */
    public function __construct($format = "Y-m-d")
    {
        $this->format = $format;
        $this->setErrorTpl("Wrong date: %s");
    }

    /**
     * @inheritdoc
     */
    protected function hasError($value)
    {
        $dtObj = date_create_from_format($this->format, $value);

        return !$dtObj;
    }
}
