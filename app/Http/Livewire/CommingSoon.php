<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class CommingSoon extends Component
{
    public $commingSoon = [];

    public function loadCommingSoon()
    {
        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->commingSoon = Cache::remember('comming-games', 3600, function () use ($after, $current) {
                return Http::withHeaders(config('services.igdb'))
                    ->withBody(
                        "fields name, cover.url, first_release_date, platforms.abbreviation, rating_count, rating, slug;
            where rating != null & cover != null
           & (first_release_date >= {$current}
            & first_release_date < {$after});
         sort first_release_date desc;
         limit 4;",
                        'text/html'
                    )
                    ->post('https://api.igdb.com/v4/games')
                    ->json();
            }
        );

        $this->commingSoon = $this->formatForView($this->commingSoon);
    }

    public function render()
    {
        return view('livewire.comming-soon');
    }

    private function formatForView($games)
    {
        return collect($games)->map(
            function ($game) {
                return collect($game)->merge(
                    [
                        'coverImageUrl' => Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']),
                        'first_release_date' => Carbon::parse($game['first_release_date'])->format('d/m/Y')
                    ]
                )->toArray();
            }
        );
    }
}
