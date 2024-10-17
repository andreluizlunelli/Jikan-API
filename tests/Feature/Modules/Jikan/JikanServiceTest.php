<?php

declare(strict_types=1);

use App\Modules\Jikan\JikanService;
use Illuminate\Support\Facades\Http;

describe('Jikan Module', function () {
   it('should be able to get top anime', function () {
       $data = [
           'data' => [
               "mal_id" => 0,
               "url" => "http://url",
               "title" => "Some title"
           ]
       ];

       Http::fake([
           '*/v4/top/anime' => Http::response($data)
       ]);

       $service = new JikanService();

       $response = $service->top()->animes();

       expect($response)->toBe($data);
   });
});
