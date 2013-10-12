<?php

namespace KsUtils\Validator;

/**
 * 10 digits phone validator
 */
class Phone extends \KsUtils\Validator
{
    function __construct()
    {
        $this->setError("Wrong phone number format: %s");
    }

    /**
     * @inheritdoc
     */
    public function check($value)
    {
        $filter = new \KsUtils\StrFilter\Phone();
        $value = $filter->filter($value);

        return (boolean) preg_match("#\d{10}#", $value);
    }
}
