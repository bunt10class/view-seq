<?php

declare(strict_types=1);

namespace Wikipedia;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class ResponseProcessor
{
    protected array $data;
    protected bool $isSuccess = true;

    public function __construct(Response $response)
    {
        $data = $response->json();

        if (array_key_exists('error', $data)) {
            $this->isSuccess = false;
            $this->logError($data['error']);
        }

        $this->data = $data;
    }

    public function processSuccessSearchByTitle(): array
    {
        return array_combine($this->data[1], $this->data[3]);
    }

    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    protected function logError(array $error): void
    {
        Log::error('Wikipedia api error. Code: ' . $error['code'] . '. Info: ' . $error['info']);
    }
}
