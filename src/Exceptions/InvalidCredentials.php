<?php

namespace TopherTk\omdblaravel\Exceptions;

use Exception;

class InvalidCredentials extends Exception
{
    public static function incorrectApiKey()
    {
        return new static('Your API key is invalid');
    }
}