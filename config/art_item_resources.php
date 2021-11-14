<?php

use ViewSeq\Helpers\ArtItemHelper;

return [
    ArtItemHelper::RESOURCE_BGG => [
        'site' => 'https://www.boardgamegeek.com',
        'credentials' => [],
        'repository' => '',
    ],
    ArtItemHelper::RESOURCE_IMDB => [
        'site' => 'https://www.imdb.com',
        'credentials' => [],
        'repository' => '',
    ],
    ArtItemHelper::RESOURCE_KP => [
        'site' => 'https://www.kinopoisk.ru',
        'credentials' => [],
        'repository' => '',
    ],
    ArtItemHelper::RESOURCE_STEAM => [
        'site' => 'https://store.steampowered.com',
        'credentials' => [],
        'repository' => '',
    ],
    ArtItemHelper::RESOURCE_WIKIPEDIA => [
        'site' => 'https://ru.wikipedia.org',
        'repository' => \ViewSeq\Repositories\ArtItem\WikipediaArtItemRepository::class,
    ],
];
