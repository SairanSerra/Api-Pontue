<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function render(){

        return response()->json([
            'statusCode' => $this->getCode(),
            'message'   => $this->getMessage()
        ],$this->getCode());
    }
}
