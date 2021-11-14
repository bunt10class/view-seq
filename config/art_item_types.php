<?php

use ViewSeq\Helpers\ArtItemHelper;

return [
    ArtItemHelper::TYPE_BOARD_GAME => [
        'resources' => [
            ArtItemHelper::RESOURCE_BGG,
        ]
    ],
    ArtItemHelper::TYPE_BOOK => [
        'resources' => [
        ]
    ],
    ArtItemHelper::TYPE_INTERACTIVE_MOVIE => [
        'resources' => [
        ]
    ],
    ArtItemHelper::TYPE_MOVIE => [
        'resources' => [
            ArtItemHelper::RESOURCE_KP,
            ArtItemHelper::RESOURCE_IMDB,
        ]
    ],
    ArtItemHelper::TYPE_MUSIC => [
        'resources' => [
        ]
    ],
    ArtItemHelper::TYPE_PAINTING => [
        'resources' => [
        ]
    ],
    ArtItemHelper::TYPE_VIDEO_GAME => [
        'resources' => [
            ArtItemHelper::RESOURCE_STEAM,
        ]
    ],
];
