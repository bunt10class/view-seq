<?php

declare(strict_types=1);

namespace ViewSeq\Http\Controllers;

use Illuminate\Http\Request;
use Shared\Http\Resources\PaginationResource;

class ArtItemController
{
    public function index(Request $request)
    {
        $client = new \Wikipedia\Client();
        $search = $request->input('search') ?? '';

        return $client->searchByTitle($search);
    }
}
