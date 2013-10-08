<?php

namespace KsUtils;

/**
 * Value validator
 */
abstract class Validator
{
    /**
     * Returns error message
     */
    abstract public function getErrorMessage($errValue);

    /**
     * Checks a value 
     */
    abstract public function check($value);
}
