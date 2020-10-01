<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];
    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->recentlyReviewed = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating_count, summary, rating;
            where rating != null & cover != null
            & (first_release_date >= {$before}
            & first_release_date < {$current}
            & rating_count > 5);
         sort rating asc;
         limit 3;",
                'text/html'
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }
    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
