<?php

namespace KsUtils\Validator;

/**
 * 10 digits phone validator
 */
class Phone extends \KsUtils\Validator
{
    function __construct()
    {
        $this->setError("Wrong number format: %s");
    }

    /**
     * @inheritdoc
     */
    public function check($value)
    {
        $filter = new \KsUtils\StrFilter\Phone();
        $value = $filter->filter($value);

        return preg_match("#\d{10}#", $value);
    }
}
