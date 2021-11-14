<?php

declare(strict_types=1);

namespace Wikipedia;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Client
{
    const NAMESPACE_GENERAL = 0;
    const FORMAT_JSON = 'json';
    const SEARCH_LIMIT = 10;

    protected array $config;
    protected string $endpoint;

    public function __construct()
    {
        $this->config = config('api.wiki');
        $this->endpoint = $this->config['endpoints']['en'];
    }

    public function searchByTitle(string $title)
    {
        $responseProcessor = new ResponseProcessor($this->sendSearchRequest($title));

        if ($responseProcessor->isSuccess()) {
            $result = $responseProcessor->processSuccessSearchByTitle();
        } else {
            $result = [];
        }

        return $result;
    }

    protected function sendSearchRequest(string $search): Response
    {
        $params = [
            'action' => $this->config['actions']['search'],
            'namespace' => self::NAMESPACE_GENERAL,
            'search' => $search,
            'format' => self::FORMAT_JSON,
            'limit' => self::SEARCH_LIMIT,
        ];

        return Http::get($this->endpoint, $params);
    }
}
