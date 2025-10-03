<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class NotFoundException extends Exception
{
    public function render()
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage() ?: 'Recurso não encontrado',
        ], Response::HTTP_NOT_FOUND);
    }
}
