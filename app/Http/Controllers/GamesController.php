<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;
        $current = Carbon::now()->timestamp;

        $popularGames = Http::withHeaders(config('services.igdb'))
        ->withBody(
            "fields name, cover.url, first_release_date, platforms.abbreviation, rating;
            where platforms = (48,49,130,6)
            & (first_release_date >= {$before}
            & first_release_date < {$after});
         sort rating asc; 
         limit 12;",
            'text/html')
        ->post('https://api.igdb.com/v4/games')
        ->json();

        $recentlyReviewed = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating_count, summary, rating;
            where platforms = (48,49,130,6)
            & (first_release_date >= {$before}
            & first_release_date < {$current}
            & rating_count > 5);
         sort rating asc;
         limit 3;",
                'text/html')
            ->post('https://api.igdb.com/v4/games')
            ->json();

        $mostAnticipated = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating_count, rating;
            where platforms = (48,49,130,6)
            & (first_release_date >= {$current}
            & first_release_date < {$afterFourMonths});
         sort rating asc;
         limit 4;",
                'text/html')
            ->post('https://api.igdb.com/v4/games')
            ->json();

        $commingSoon = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating_count, rating;
            where platforms = (48,49,130,6)
           & (first_release_date >= {$current}
            & first_release_date < {$after});
         sort first_release_date desc;
         limit 4;",
                'text/html')
            ->post('https://api.igdb.com/v4/games')
            ->json();

        return view('index',[
            'popularGames' => $popularGames,
            'recentlyReviewed' => $recentlyReviewed,
            'mostAnticipated' => $mostAnticipated,
            'commingSoon' => $commingSoon,
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
