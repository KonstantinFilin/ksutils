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
    protected $error;

    /**
     * Error message template when value is not valid
     * @var string
     */
    protected $errorTpl;

    /**
     * Returns error message
     * @param  mixed  $wrongValue Value not passed validation
     * @return string Error message
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Sets error message for validator
     * @param string $errorMessage Error message
     */
    public function setErrorTpl($errorMessage)
    {
        $this->errorTpl = $errorMessage;
    }

    /**
     * Checks a value and sets error message
     * @param  mixed   $value Value to check
     * @return boolean True if value is valid and False otherwise
     */
    public function check($value)
    {
        if ($this->hasError($value)) {
            $this->error = sprintf($this->errorTpl, (string) $value);

            return false;
        }

        return true;
    }

    /**
     * Checks a value
     * @param  string  $value String to check
     * @return boolean True if value is valid and False otherwise
     */
    abstract protected function hasError($value);
}
