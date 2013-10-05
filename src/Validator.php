<?php

namespace KsUtils;

/**
 * Description of Validator
 *
 * @author kostya
 */
abstract class Validator {
    abstract function getErrorMessage($errValue);
    abstract function check($value);
}

?>
