<?php

namespace KsUtils\Validator;

/**
 * Not empty Validator
 * @author kostya
 */
class NotEmpty extends \KsUtils\Validator
{
    function __construct()
    {
        $this->setError("Must not be empty: %s");
    }

    /**
     * @inheritdoc
     */
    public function check($value)
    {
        return !is_null($value) && trim($value) !== "";
    }
}
