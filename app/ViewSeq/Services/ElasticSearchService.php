<?php

declare(strict_types=1);

namespace ViewSeq\Services;

use ViewSeq\Helpers\ElasticSearchHelper;
use ViewSeq\Repositories\ElasticSearchRepository;
use ViewSeq\ValueObjects\ArtItem\ArtItem;

class ElasticSearchService
{
    protected ElasticSearchRepository $elasticSearchRepository;

    public function __construct(ElasticSearchRepository $elasticSearchRepository)
    {
        $this->elasticSearchRepository = $elasticSearchRepository;
    }

    public function search(string $className, string $searchString)
    {
        $result = $this->elasticSearchRepository->search(ElasticSearchHelper::TYPE_ART_ITEM, $searchString);
        dd($result);
    }

    public function storeByModel(ArtItem $artItem)
    {
        $body = $artItem->toArrayForElasticSearch();

        $result = $this->elasticSearchRepository->create(ElasticSearchHelper::TYPE_ART_ITEM, $body);
    }
}
