<?php

declare(strict_types=1);

namespace ViewSeq\Helpers;

use Illuminate\Support\Arr;

class ArtItemHelper
{
    public const TYPE_UNIVERSE = 'universe';

    public const TYPE_BOARD_GAME = 'board_game';
    public const TYPE_BOOK = 'book';
    public const TYPE_INTERACTIVE_MOVIE = 'interactive_movie';
    public const TYPE_MOVIE = 'movie';
    public const TYPE_MUSIC = 'music';
    public const TYPE_PAINTING = 'painting';
    public const TYPE_VIDEO_GAME = 'video_game';

    public const RESOURCE_BGG = 'bgg';
    public const RESOURCE_IMDB = 'imdb';
    public const RESOURCE_KP = 'kp';
    public const RESOURCE_STEAM = 'steam';
    public const RESOURCE_WIKIPEDIA = 'wikipedia';

    public static function getAllTypes(): array
    {
        return array_keys(config('art_item_types'));
    }

    public static function getAllResources(): array
    {
        return array_keys(config('art_item_resources'));
    }

    public static function getTypeResources(string $artItemType): array
    {
        $artItemTypeResources = Arr::get(config('art_item_types'), $artItemType . 'resources', []);
        $artItemTypeResources[] = self::RESOURCE_WIKIPEDIA;

        return $artItemTypeResources;
    }
}
