<?php

namespace App\Modules\Jikan\Jobs;

use App\Models\Anime;
use App\Modules\Jikan\JikanFacade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\RateLimited;

class TopAnime implements ShouldQueue
{
    use Queueable;

    public function __construct(readonly private int $page = 1) {}

    public function handle(): void
    {
        $response = JikanFacade::top()->animes([
            'page' => $this->page,
        ]);

        foreach ($response['data'] as $anime) {
            Anime::updateOrCreate([
                'mal_id' => $anime['mal_id'],
            ], [
                'url' => $anime['url'],
                'title' => $anime['title'],
                'type' => $anime['type'],
                'source' => $anime['source'],
                'status' => $anime['status'],
                'episodes' => $anime['episodes'],
                'duration' => $anime['duration'],
                'rating' => $anime['rating'],
                'score' => $anime['score'],
                'popularity' => $anime['popularity'],
                'synopsis' => $anime['synopsis'],
                'aired_from' => $anime['aired']['from'],
                'aired_to' => $anime['aired']['to'],
            ]);
        }

        if ($response['pagination']['has_next_page']) {
            $this->dispatch($response['pagination']['current_page'] + 1);
        }
    }

    public function middleware(): array
    {
        return [new RateLimited('jikan')];
    }
}
