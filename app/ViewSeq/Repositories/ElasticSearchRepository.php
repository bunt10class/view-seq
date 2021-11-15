<?php

declare(strict_types=1);

namespace ViewSeq\Repositories;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use ViewSeq\Helpers\ElasticSearchHelper;

class ElasticSearchRepository
{
    protected Client $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()
            ->setHosts(config('elastic_search_endpoints'))
            ->build();;
    }

    public function search(string $type, string $searchString): array
    {
        return $this->client->search(ElasticSearchHelper::collectParamsForSearch($type, $searchString));
    }

    public function create(string $type, array $body): array
    {
        return $this->client->index(ElasticSearchHelper::collectParamsByTypeAndBody($type, $body));
    }
}
