<?php

declare(strict_types=1);

namespace ViewSeq\Helpers;

class ElasticSearchHelper
{
    public const INDEX_VIEW_SEQ = 'view_seq';

    public const TYPE_ART_ITEM = 'art_item';

    public static function collectParamsByTypeAndBody(string $type, array $body): array
    {
        return [
            'index' => self::INDEX_VIEW_SEQ,
            'type' => $type,
            'body' => $body,
        ];
    }

    public static function collectParamsForSearch(string $type, string $searchString): array
    {
        $body = [
            'query' => [
                'match' => [
                    'ru_name' => $searchString
                ]
            ],
        ];

        return self::collectParamsByTypeAndBody($type, $body);
    }
}
