<?php

namespace KsUtils;

/**
 * File utils
 */
class File
{
    /**
     * Returns new version of filename. abc.2.ext -> abc.3.ext; abc.4 -> abc.5
     * abc -> abc.1
     * @param string $filename Old version of filename
     * @return New version of filename
     */
    function incrVersion($filename)
    {
        $pat = "|^\d+$|";
        
        $parts = explode(".", $filename);
        $partsCount = count($parts);

        if ($partsCount == 1) {
            return $filename . ".1";
        }

        if ($partsCount == 2) {
            if (preg_match($pat, $parts[1])) {
                return $parts[0] . "." . ++$parts[1];
            } 

            return $parts[0] . ".1." . $parts[1];
        }

        if (preg_match($pat, $parts[$partsCount - 1])) {
            return implode(".", array_slice($parts, 0, -1)) . "." . ++$parts[$partsCount - 1];
        }

        if (preg_match($pat, $parts[$partsCount - 2])) {
            return implode(
                ".", 
                array_slice($parts, 0, -2)
            ) 
            . "." . ++$parts[$partsCount - 2] 
            . "." . $parts[$partsCount - 1];
        }

        return implode(".", array_slice($parts, 0, -1)) . ".1." . $parts[$partsCount - 1];
    }
}
