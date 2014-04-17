<?php

namespace KsUtils\Validator;

/**
 * 10 digits phone validator
 */
class Phone extends \KsUtils\Validator
{
    /**
     * Class contructor
     */
    public function __construct()
    {
        $this->setErrorTpl("Wrong phone number format: %s");
    }

    /**
     * @inheritdoc
     */
    protected function hasError($value)
    {
        $filter = new \KsUtils\StrFilter\Phone();
        $value = $filter->filter($value);

        return !preg_match("#\d{10}#", $value);
    }
}
