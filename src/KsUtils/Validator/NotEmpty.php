<?php

namespace KsUtils\Validator;

/**
 * Not empty Validator
 * @author kostya
 */
class NotEmpty extends \KsUtils\Validator
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->setErrorTpl("Must not be empty: [%s]");
    }

    /**
     * @inheritdoc
     */
    protected function hasError($value)
    {
        return is_null($value) || trim($value) === "";
    }
}
