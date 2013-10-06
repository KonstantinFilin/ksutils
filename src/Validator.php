<?php

namespace KsUtils;

/**
 * Description of Validator
 *
 * @author kostya
 */
abstract class Validator
{
    abstract public function getErrorMessage($errValue);
    abstract public function check($value);
}
