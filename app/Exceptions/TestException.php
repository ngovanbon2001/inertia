<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TestException extends Exception
{
    /**
     * @param string|null $message The internal exception message
     * @param Throwable|null $previous The previous exception
     */
    public function __construct(?string $message = '', Throwable $previous = null)
    {
        parent::__construct($message, 401, $previous);
    }

    public function render()
    {
        return back()->withErrors($this->message);
    }
}
