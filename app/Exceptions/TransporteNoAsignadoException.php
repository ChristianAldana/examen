<?php

namespace App\Exceptions;

use Exception;

class TransporteNoAsignadoException extends Exception
{
    public function __construct($message = 'No se ha asignado un prestamo al libro', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
