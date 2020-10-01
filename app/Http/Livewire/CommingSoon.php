<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CommingSoon extends Component
{
    public $commingSoon = [];

     public function loadCommingSoon(){

         $after = Carbon::now()->addMonths(2)->timestamp;
         $current = Carbon::now()->timestamp;

         $this->commingSoon = Http::withHeaders(config('services.igdb'))
             ->withBody(
                 "fields name, cover.url, first_release_date, platforms.abbreviation, rating_count, rating;
            where rating != null & cover != null
           & (first_release_date >= {$current}
            & first_release_date < {$after});
         sort first_release_date desc;
         limit 4;",
                 'text/html')
             ->post('https://api.igdb.com/v4/games')
             ->json();

     }
    public function render()
    {
        return view('livewire.comming-soon');
    }
}
