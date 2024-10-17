<?php

namespace App\Modules\Jikan;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \App\Modules\Jikan\JikanService
 */
class JikanFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return JikanService::class;
    }
}
