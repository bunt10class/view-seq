<?php

declare(strict_types=1);

namespace ViewSeq\Providers;

use App\Providers\AppServiceProvider;
use ViewSeq\Models\Universe;
use ViewSeq\Models\UniverseItem;
use ViewSeq\Repositories\UniverseItemRepository;
use ViewSeq\Repositories\UniverseRepository;

class ViewSeqServiceProvider extends AppServiceProvider
{
    public function register()
    {
        parent::register();

        $this->app->bind(UniverseRepository::class, function () {
            return new UniverseRepository(new Universe());
        });

        $this->app->bind(UniverseItemRepository::class, function () {
            return new UniverseItemRepository(new UniverseItem());
        });
    }
}
