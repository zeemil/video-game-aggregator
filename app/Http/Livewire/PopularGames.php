<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class PopularGames extends Component
{

    public $popularGames = [];

    public function loadPopularGames(){
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $popularGamesUnformatted = Cache::remember('popular-games', 3600, function () use ($after, $before) {
            return  Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "fields name, cover.url, first_release_date, platforms.abbreviation, rating, slug;
                        where rating != null & cover != null
                        & (first_release_date >= {$before}
                        & first_release_date < {$after});
                     sort rating desc; 
                     limit 12;",
                    'text/html')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->popularGames = $this->formatForView($popularGamesUnformatted);
        collect($this->popularGames )->filter(function($game) {
            return $game['rating'];
        })
        ->each(function($game){
            $this->emit('gameWithRatingAdded', [
                'slug' => $game['slug'],
                'rating' => $game['rating'] / 100
            ]);
        });

    }

    public function render()
    {
        return view('livewire.popular-games');
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game){
            return collect($game)->merge([
                'coverImageUrl' =>  Str::replaceFirst('thumb', 'cover_big',$game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                ])->toArray();
        });
    }
}
