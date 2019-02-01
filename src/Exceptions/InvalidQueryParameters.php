<?php

namespace TopherTk\omdblaravel\Exceptions;

use Exception;

class InvalidQueryParameters extends Exception
{
    public static function emptyQueryParameters($paramsCount)
    {
        return new static("Object was expecting at least 1 parameter, received $paramsCount");
    }
}