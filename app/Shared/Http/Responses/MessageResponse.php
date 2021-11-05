<?php

declare(strict_types=1);

namespace Shared\Http\Responses;

use Illuminate\Http\JsonResponse;

class MessageResponse extends JsonResponse
{
    public static function make(string $message, int $code): JsonResponse
    {
        return new self([
            'data' => [
                'status' => $code >= 200 && $code < 300,
                'message' => $message,
            ],
        ], $code);
    }

    public static function makeOkResponse(string $message = ''): JsonResponse
    {
        return self::make($message, 200);
    }
}
