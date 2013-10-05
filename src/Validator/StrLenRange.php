<?php

namespace KsUtils\Validator;

/**
 * Description of StrLenRange
 *
 * @author kostya
 */
class StrLenRange extends \KsUtils\Validator
{
    protected $min;
    protected $max;
    
    function __construct($min, $max) {
        $this->min = $min;
        $this->max = $max;
    }
    
    public function getErrorMessage($errValue) {
        return sprintf(
            "Длина строки должна быть от %u до %u символов",
            $this->min,
            $this->max
        );
    }

    public function check($value) 
    {
        $len = strlen($value);
        
        return $len >= $this->min && $len <= $this->max;
    }
}

?>
