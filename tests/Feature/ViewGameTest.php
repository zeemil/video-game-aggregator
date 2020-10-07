<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewGameTest extends TestCase
{
    /** @test */
    public function the_game_page_shows_correct_game_info()
    {
        Http::fake(
            [
                'https://api.igdb.com/v4/games' => $this->fakeSingleGame(),
            ]
        );

        $response = $this->get(route('games.show', 'fake-spiritfarer'));
//        dump($response);
        $response->assertSuccessful();
    }

    private function fakeSingleGame()
    {
        $game = [
            'id' => 119304,
            'aggregated_rating' => 87.5,
            'cover' =>
                [
                    'id' => 113263,
                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co2fe7.jpg',
                ],
            'first_release_date' => 1597708800,
            'genres' => 'Platform, Simulator, Adventure, Indie',
            'involved_companies' =>
                [
                    0 =>
                        [
                            'id' => 106037,
                            'company' =>
                                [
                                    'id' => 7097,
                                    'name' => 'Thunder Lotus Games',
                                ],
                        ],
                ],
            'name' => 'FAKE Spiritfarer',
            'slug' => 'fake-spiritfarer',
            'platforms' => 'FAKE, Linux, PC, Mac, PS4, XONE, Switch',
            'rating' => 91.72067678569769,
            'screenshots' =>
                [
                    0 =>
                        [
                            'big' => '//images.igdb.com/igdb/image/upload/t_screenshot_big/sc6lc7.jpg',
                            'huge' => '//images.igdb.com/igdb/image/upload/t_screenshot_huge/sc6lc7.jpg',
                        ],
                    1 =>
                        [
                            'big' => '//images.igdb.com/igdb/image/upload/t_screenshot_big/sc6lc8.jpg',
                            'huge' => '//images.igdb.com/igdb/image/upload/t_screenshot_huge/sc6lc8.jpg',
                        ],
                    2 =>
                        [
                            'big' => '//images.igdb.com/igdb/image/upload/t_screenshot_big/sc6lc9.jpg',
                            'huge' => '//images.igdb.com/igdb/image/upload/t_screenshot_huge/sc6lc9.jpg',
                        ],
                    3 =>
                        [
                            'big' => '//images.igdb.com/igdb/image/upload/t_screenshot_big/sc6lca.jpg',
                            'huge' => '//images.igdb.com/igdb/image/upload/t_screenshot_huge/sc6lca.jpg',
                        ],
                    4 =>
                        [
                            'big' => '//images.igdb.com/igdb/image/upload/t_screenshot_big/sc6lcb.jpg',
                            'huge' => '//images.igdb.com/igdb/image/upload/t_screenshot_huge/sc6lcb.jpg',
                        ],
                    5 =>
                        [
                            'big' => '//images.igdb.com/igdb/image/upload/t_screenshot_big/sc6lcc.jpg',
                            'huge' => '//images.igdb.com/igdb/image/upload/t_screenshot_huge/sc6lcc.jpg',
                        ],
                ],
            'similar_games' =>
                [
                    0 =>
                        [
                            'id' => 9243,
                            'cover' =>
                                [
                                    'id' => 13044,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/ttaatqkearykpgkmz0ad.jpg',
                                ],
                            'name' => 'Life is Feudal: Your Own',
                            'platforms' =>
                                [
                                    0 =>
                                        [
                                            'id' => 6,
                                            'abbreviation' => 'PC',
                                        ],
                                ],
                            'rating' => 69.9067722075638,
                            'slug' => 'life-is-feudal-your-own',
                        ],
                    1 =>
                        [
                            'id' => 24426,
                            'cover' =>
                                [
                                    'id' => 81872,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1r68.jpg',
                                ],
                            'name' => 'Forgotton Anne',
                            'platforms' =>
                                [
                                    0 =>
                                        [
                                            'id' => 6,
                                            'abbreviation' => 'PC',
                                        ],
                                    1 =>
                                        [
                                            'id' => 14,
                                            'abbreviation' => 'Mac',
                                        ],
                                    2 =>
                                        [
                                            'id' => 39,
                                            'abbreviation' => 'iOS',
                                        ],
                                    3 =>
                                        [
                                            'id' => 48,
                                            'abbreviation' => 'PS4',
                                        ],
                                    4 =>
                                        [
                                            'id' => 49,
                                            'abbreviation' => 'XONE',
                                        ],
                                    5 =>
                                        [
                                            'id' => 130,
                                            'abbreviation' => 'Switch',
                                        ],
                                ],
                            'rating' => 72.8887475007729,
                            'slug' => 'forgotton-anne',
                        ],
                    2 =>
                        [
                            'id' => 25580,
                            'cover' =>
                                [
                                    'id' => 69168,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1hdc.jpg',
                                ],
                            'name' => 'Forager',
                            'platforms' =>
                                [
                                    0 =>
                                        [
                                            'id' => 3,
                                            'abbreviation' => 'Linux',
                                        ],
                                    1 =>
                                        [
                                            'id' => 6,
                                            'abbreviation' => 'PC',
                                        ],
                                    2 =>
                                        [
                                            'id' => 34,
                                            'abbreviation' => 'Android',
                                        ],
                                    3 =>
                                        [
                                            'id' => 39,
                                            'abbreviation' => 'iOS',
                                        ],
                                    4 =>
                                        [
                                            'id' => 130,
                                            'abbreviation' => 'Switch',
                                        ],
                                ],
                            'rating' => 80.0017431453165,
                            'slug' => 'forager',
                        ],
                    3 =>
                        [
                            'id' => 28070,
                            'cover' =>
                                [
                                    'id' => 81870,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1r66.jpg',
                                ],
                            'name' => 'PLANET ALPHA',
                            'platforms' =>
                                [
                                    0 =>
                                        [
                                            'id' => 6,
                                            'abbreviation' => 'PC',
                                        ],
                                    1 =>
                                        [
                                            'id' => 48,
                                            'abbreviation' => 'PS4',
                                        ],
                                    2 =>
                                        [
                                            'id' => 49,
                                            'abbreviation' => 'XONE',
                                        ],
                                    3 =>
                                        [
                                            'id' => 130,
                                            'abbreviation' => 'Switch',
                                        ],
                                ],
                            'rating' => 69.9084099269264,
                            'slug' => 'planet-alpha',
                        ],
                    4 =>
                        [
                            'id' => 37419,
                            'cover' =>
                                [
                                    'id' => 107550,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co2azi.jpg',
                                ],
                            'name' => 'Dude Simulator',
                            'platforms' =>
                                [
                                    0 =>
                                        [
                                            'id' => 6,
                                            'abbreviation' => 'PC',
                                        ],
                                ],
                            'rating' => 79.9116334941313,
                            'slug' => 'dude-simulator',
                        ],
                    5 =>
                        [
                            'id' => 96217,
                            'cover' =>
                                [
                                    'id' => 72919,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1k9j.jpg',
                                ],
                            'name' => 'Eternity: The Last Unicorn',
                            'platforms' =>
                                [
                                    0 =>
                                        [
                                            'id' => 6,
                                            'abbreviation' => 'PC',
                                        ],
                                    1 =>
                                        [
                                            'id' => 48,
                                            'abbreviation' => 'PS4',
                                        ],
                                    2 =>
                                        [
                                            'id' => 49,
                                            'abbreviation' => 'XONE',
                                        ],
                                ],
                            'rating' => 60.0,
                            'slug' => 'eternity-the-last-unicorn',
                        ],
                    6 =>
                        [
                            'id' => 106279,
                            'cover' =>
                                [
                                    'id' => 70048,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1i1s.jpg',
                                ],
                            'name' => 'Among Trees',
                            'platforms' =>
                                [
                                    0 =>
                                        [
                                            'id' => 6,
                                            'abbreviation' => 'PC',
                                        ],
                                ],
                            'slug' => 'among-trees',
                        ],
                    7 =>
                        [
                            'id' => 113360,
                            'cover' =>
                                [
                                    'id' => 81869,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1r65.jpg',
                                ],
                            'name' => 'Hytale',
                            'platforms' =>
                                [
                                    0 =>
                                        [
                                            'id' => 6,
                                            'abbreviation' => 'PC',
                                        ],
                                    1 =>
                                        [
                                            'id' => 14,
                                            'abbreviation' => 'Mac',
                                        ],
                                ],
                            'slug' => 'hytale',
                        ],
                    8 =>
                        [
                            'id' => 116681,
                            'cover' =>
                                [
                                    'id' => 75818,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1mi2.jpg',
                                ],
                            'name' => 'Hob: The Definitive Edition',
                            'platforms' =>
                                [
                                    0 =>
                                        [
                                            'id' => 130,
                                            'abbreviation' => 'Switch',
                                        ],
                                ],
                            'rating' => 77.7722280619314,
                            'slug' => 'hob-the-definitive-edition',
                        ],
                ],
            'storyline' => 'You play Stella, ferrymaster to the deceased, a Spiritfarer. Build a boat to explore the world, pick up spirits, and release them into the afterlife. Gather, produce, and consume resources while you guide your passengers across mystical seas. Join the adventure as Daffodil the cat, in two-player cooperative play. Spend relaxing quality time with your spirit passengers, building and tending to your relationships, and, ultimately, learn how to say goodbye to your cherished friends.',
            'summary' => 'Spiritfarer is a cozy management game about dying. You play Stella, ferrymaster to the deceased, a Spiritfarer. Build a boat to explore the world, then befriend and care for spirits before finally releasing them into the afterlife. Farm, mine, fish, harvest, cook, and craft your way across mystical seas. Join the adventure as Daffodil the cat, in two-player cooperative play. Spend relaxing quality time with your spirit passengers, create lasting memories, and, ultimately, learn how to say goodbye to your cherished friends. What will you leave behind?',
            'videos' =>
                [
                    0 =>
                        [
                            'id' => 29218,
                            'game' => 119304,
                            'name' => 'Trailer',
                            'video_id' => 'RLGdX-cQ6Vk',
                            'checksum' => 'dbdf7137-7594-639e-1837-fc33c9a669b7',
                        ],
                    1 =>
                        [
                            'id' => 29251,
                            'game' => 119304,
                            'name' => 'Nintendo Switch Gameplay Trailer',
                            'video_id' => 't-NmNCRDcc0',
                            'checksum' => '0ac71ded-0f93-64d2-69cd-2d4a352a5712',
                        ],
                    2 =>
                        [
                            'id' => 36361,
                            'game' => 119304,
                            'name' => 'Teaser',
                            'video_id' => '0AtPu52_plI',
                            'checksum' => '02d50165-6de0-4a50-4d19-e7a217675983',
                        ],
                    3 =>
                        [
                            'id' => 39861,
                            'game' => 119304,
                            'name' => 'Announcement Trailer',
                            'video_id' => 'NRILrZSrDks',
                            'checksum' => '28910cce-088f-3684-062e-e03161b99d8c',
                        ],
                    4 =>
                        [
                            'id' => 39862,
                            'game' => 119304,
                            'name' => 'Launch Trailer',
                            'video_id' => 'Xu4JHmcfrtw',
                            'checksum' => 'cf0aa16d-eae7-8c16-fc80-90808f5fa9c8',
                        ],
                ],
            'websites' =>
                [
                    0 =>
                        [
                            'id' => 110888,
                            'category' => 13,
                            'game' => 119304,
                            'trusted' => true,
                            'url' => 'https://store.steampowered.com/app/972660',
                            'checksum' => '9cb3b403-5549-a82e-dc22-36a85f4c78fa',
                        ],
                    1 =>
                        [
                            'id' => 110889,
                            'category' => 1,
                            'game' => 119304,
                            'trusted' => false,
                            'url' => 'https://thunderlotusgames.com/spiritfarer',
                            'checksum' => '3c59613d-c7a4-fdd6-64b1-7aa99a8bdc81',
                        ],
                    2 =>
                        [
                            'id' => 149884,
                            'category' => 17,
                            'game' => 119304,
                            'trusted' => true,
                            'url' => 'https://www.gog.com/game/spiritfarer',
                            'checksum' => '40f71199-e404-468e-3865-c92fc68d0b7a',
                        ],
                    3 =>
                        [
                            'id' => 149885,
                            'category' => 16,
                            'game' => 119304,
                            'trusted' => true,
                            'url' => 'https://www.epicgames.com/store/en-US/product/spiritfarer',
                            'checksum' => '2877b067-0b09-b986-f2f0-fa70e3fe2cea',
                        ],
                    4 =>
                        [
                            'id' => 149886,
                            'category' => 15,
                            'game' => 119304,
                            'trusted' => true,
                            'url' => 'https://thunderlotus.itch.io/spiritfarer',
                            'checksum' => 'd7901af8-381e-8e0f-6351-7ae3d109811f',
                        ],
                ],
            'coverImageUrl' => '//images.igdb.com/igdb/image/upload/t_cover_big/co2fe7.jpg',
            'memberRating' => '92%',
            'aggregatedRating' => '88%',
            'involvedCompanies' => 'Thunder Lotus Games',
            'trailer' => 'https://youtube.com/watch/RLGdX-cQ6Vk',
            'similarGames' =>
                [
                    0 =>
                        [
                            'id' => 9243,
                            'cover' =>
                                [
                                    'id' => 13044,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/ttaatqkearykpgkmz0ad.jpg',
                                ],
                            'name' => 'Life is Feudal: Your Own',
                            'platforms' => 'PC',
                            'rating' => '70%',
                            'slug' => 'life-is-feudal-your-own',
                            'coverImageUrl' => '//images.igdb.com/igdb/image/upload/t_cover_big/ttaatqkearykpgkmz0ad.jpg',
                        ],
                    1 =>
                        [
                            'id' => 24426,
                            'cover' =>
                                [
                                    'id' => 81872,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1r68.jpg',
                                ],
                            'name' => 'Forgotton Anne',
                            'platforms' => 'PC, Mac, iOS, PS4, XONE, Switch',
                            'rating' => '73%',
                            'slug' => 'forgotton-anne',
                            'coverImageUrl' => '//images.igdb.com/igdb/image/upload/t_cover_big/co1r68.jpg',
                        ],
                    2 =>
                        [
                            'id' => 25580,
                            'cover' =>
                                [
                                    'id' => 69168,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1hdc.jpg',
                                ],
                            'name' => 'Forager',
                            'platforms' => 'Linux, PC, Android, iOS, Switch',
                            'rating' => '80%',
                            'slug' => 'forager',
                            'coverImageUrl' => '//images.igdb.com/igdb/image/upload/t_cover_big/co1hdc.jpg',
                        ],
                    3 =>
                        [
                            'id' => 28070,
                            'cover' =>
                                [
                                    'id' => 81870,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1r66.jpg',
                                ],
                            'name' => 'PLANET ALPHA',
                            'platforms' => 'PC, PS4, XONE, Switch',
                            'rating' => '70%',
                            'slug' => 'planet-alpha',
                            'coverImageUrl' => '//images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg',
                        ],
                    4 =>
                        [
                            'id' => 37419,
                            'cover' =>
                                [
                                    'id' => 107550,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co2azi.jpg',
                                ],
                            'name' => 'Dude Simulator',
                            'platforms' => 'PC',
                            'rating' => '80%',
                            'slug' => 'dude-simulator',
                            'coverImageUrl' => '//images.igdb.com/igdb/image/upload/t_cover_big/co2azi.jpg',
                        ],
                    5 =>
                        [
                            'id' => 96217,
                            'cover' =>
                                [
                                    'id' => 72919,
                                    'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co1k9j.jpg',
                                ],
                            'name' => 'Eternity: The Last Unicorn',
                            'platforms' => 'PC, PS4, XONE',
                            'rating' => '60%',
                            'slug' => 'eternity-the-last-unicorn',
                            'coverImageUrl' => '//images.igdb.com/igdb/image/upload/t_cover_big/co1k9j.jpg',
                        ],
                ],
            'social' =>
                [
                    'website' =>
                        [
                            'id' => 110888,
                            'category' => 13,
                            'game' => 119304,
                            'trusted' => true,
                            'url' => 'https://store.steampowered.com/app/972660',
                            'checksum' => '9cb3b403-5549-a82e-dc22-36a85f4c78fa',
                        ],
                    'facebook' => null,
                    'twitter' => null,
                    'instagram' => null,
                ],
        ];
        return Http::response([$game]);
    }
}
