<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PopularGames extends Component
{

    public $popularGames = [];

    public function loadPopularGames(){
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $this->popularGames = Cache::remember('popular-games', 30, function () use ($after, $before) {
            return  Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "fields name, cover.url, first_release_date, platforms.abbreviation, rating;
                        where rating != null & cover != null
                        & (first_release_date >= {$before}
                        & first_release_date < {$after});
                     sort rating desc; 
                     limit 12;",
                    'text/html')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

    }
    public function render()
    {
        return view('livewire.popular-games');
    }
}
