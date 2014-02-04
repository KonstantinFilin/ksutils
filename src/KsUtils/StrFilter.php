<?php

namespace KsUtils;

/**
 * Filtering string value
 */
interface StrFilter
{
    /**
     * Applying a filter. Returns filtered string
     */
    public function filter($str);
}
