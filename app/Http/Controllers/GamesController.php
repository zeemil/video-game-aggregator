<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('index');

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
     * @param  string  $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
       $game = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, websites.*, videos.*, screenshots.*, 
                similar_games.cover.url, similar_games.name, platforms.abbreviation,
                similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug,genres.name,
                involved_companies.company.name,
                 rating, aggregated_rating, summary, storyline;
                where slug=\"{$slug}\";",
                'text/html')
            ->post('https://api.igdb.com/v4/games')
            ->json();

       abort_if(!$game, 404);
       $formattedGame =  $this->formatForView($game[0]);

        return view('show', [
            'game' => $formattedGame,
        ]);
    }

    private function formatForView($game)
    {
        return collect($game)->merge(
            [
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'memberRating' => isset($game['rating']) ? round($game['rating']) : '0',
                'aggregatedRating' => isset($game['aggregated_rating']) ? round($game['aggregated_rating'])  : '0',
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
                'genres' => collect($game['genres'])->pluck('name')->implode(', '),
                'involvedCompanies' => $game['involved_companies'][0]['company']['name'],
                'trailer' => 'https://youtube.com/watch/'.$game['videos'][0]['video_id'],
                'screenshots' => collect($game['screenshots'])->map(function ($screenshot){
                    return [
                        'big' => Str::replaceFirst('thumb', 'screenshot_big',$screenshot['url']),
                        'huge' => Str::replaceFirst('thumb', 'screenshot_huge',$screenshot['url']),
                    ];
                })->take(6),
                'similarGames' => collect($game['similar_games'])->map(function ($game){
                    return collect($game)->merge([
                        'coverImageUrl' => array_key_exists('cover', $game) ?
                            Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) :
                            'https://via.placeholder.com/264x352',
                        'rating' => isset($game['rating']) ? round($game['rating']).'%' : null,
                        'platforms' => array_key_exists('platforms', $game) ?
                            collect($game['platforms'])->pluck('abbreviation')->implode(', ') :
                             null,
                    ]);

                })->take(6),
                'social' => [
                    'website' => collect($game['websites'])->first(),
                    'facebook' => collect($game['websites'])->filter(function($website){
                        return Str::contains($website['url'], 'facebook');
                    })->first(),
                    'twitter' => collect($game['websites'])->filter(function($website){
                        return Str::contains($website['url'], 'twitter');
                    })->first(),
                    'instagram' => collect($game['websites'])->filter(function($website){
                        return Str::contains($website['url'], 'instagram');
                    })->first(),
                ],
            ]
        )->toArray();
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
