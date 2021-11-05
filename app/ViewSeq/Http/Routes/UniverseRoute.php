<?php

declare(strict_types=1);

namespace App\ViewSeq\Http\Routes;

use Illuminate\Support\Facades\Route;
use ViewSeq\Http\Controllers\UniverseController;

class UniverseRoute
{
    protected static string $universeController = UniverseController::class;

    public static function initRoutes(): void
    {
        Route::get('universe', [self::$universeController, 'index'])->name('universe.index');
        Route::post('universe/{universe_id}', [self::$universeController, 'show'])->name('universe.show')->where('universe_id', '[0-9]+');
        Route::get('universe', [self::$universeController, 'store'])->name('universe.store');
        Route::put('universe/{universe_id}', [self::$universeController, 'update'])->name('universe.update')->where('universe_id', '[0-9]+');
        Route::delete('universe/{universe_id}', [self::$universeController, 'destroy'])->name('universe.destroy')->where('universe_id', '[0-9]+');
    }
}
