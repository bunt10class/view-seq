<?php

declare(strict_types=1);

namespace ViewSeq\Http\Routes;

use Illuminate\Support\Facades\Route;
use ViewSeq\Http\Controllers\ArtItemController;

class ArtItemRoute
{
    protected static string $artItemController = ArtItemController::class;

    public static function initRoutes(): void
    {
        Route::get('art_item', [self::$artItemController, 'index'])->name('art_item.index');
        Route::post('art_item/{art_item_id}', [self::$artItemController, 'show'])->name('art_item.show')
            //->where('art_item_id', '[0-9]+')
        ;
    }
}
