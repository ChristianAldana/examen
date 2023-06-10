<?php

namespace App\Exceptions;

use Exception;

class DatosInvalidosException extends Exception
{

    public function __construct($message = 'Los datos ingresados no son válidos', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    //
}
