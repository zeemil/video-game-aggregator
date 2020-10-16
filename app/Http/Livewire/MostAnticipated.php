<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated(){

        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->mostAnticipated = Cache::remember('most-anticipated', 3600, function () use ($afterFourMonths, $current) {
            return  Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "fields name, cover.url, first_release_date, platforms.abbreviation, rating_count, rating, slug;
            where rating != null & cover != null
            & (first_release_date >= {$current}
            & first_release_date < {$afterFourMonths});
         sort rating desc;
         limit 4;",
                    'text/html')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->mostAnticipated = $this->formatForView($this->mostAnticipated);

    }

    public function render()
    {
        return view('livewire.most-anticipated');
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
