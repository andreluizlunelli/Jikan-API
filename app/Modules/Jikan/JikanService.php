<?php

namespace App\Modules\Jikan;

class JikanService
{
    public function __construct(
        public readonly string $baseUrl = 'https://api.jikan.moe/v4'
    ) {}

    public function top(): Endpoints\Top
    {
        return new Endpoints\Top($this);
    }
}
