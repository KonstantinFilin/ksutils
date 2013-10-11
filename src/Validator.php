<?php

namespace KsUtils;

/**
 * Value validator
 */
abstract class Validator
{
    /**
     * Error message when value is not valid
     * @var string
     */
    protected $errorMessage;

    /**
     * Returns error message
     * @param mixed $wrongValue Value not passed validation
     * @return string Error message
     */
    public function getError($wrongValue)
    {
        return sprintf(
            $this->errorMessage,
            $wrongValue
        );
    }

    /**
     * Sets error message for validator
     * @param string $errorMessage Error message
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * Checks a value
     * @param string $value String to check
     * @return boolean True if value is valid and False otherwise
     */
    abstract public function check($value);
}
