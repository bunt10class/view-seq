<?php

return [
    'endpoints' => [
        env('ELASTIC_SEARCH_HOST', 'localhost') . ':' . env('ELASTIC_SEARCH_PORT', 9200),
    ],
];
