<?php

namespace App\Modules\Jikan\Endpoints;

use App\Modules\Jikan\JikanService;
use Illuminate\Support\Facades\Http;

class Top
{
    public function __construct(readonly private JikanService $service)
    {}

    public function animes(array $query = []): array
    {
        return Http::baseUrl($this->service->baseUrl)
            ->get('/top/anime', $query)
            ->json();
    }
}
