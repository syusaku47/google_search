<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleService;

class GoogleController extends Controller
{
    public function index(Request $request)
    {
        //取得スタート位置
        $start = 1;

        //検索結果変数
        $my_arr = null;
        if (isset($request->search)) {
//            $my_arr = GoogleService::search_google_list($request,$start);
            $my_arr = [
                'items' => [
                    0 => [
                        'link' => 'https://en.wikipedia.org/wiki/Junichi_Masuda',
                        'title' => 'Junichi Masuda - Wikipedia',
                        'htmlSnippet' => 'Junichi <b>Masuda</b> is a Japanese video game composer, director, designer, producer, singer, programmer and trombonist, best known for his work in the Pokémon',
                    ],
                    1 => [
                        'link' => 'https://masuda.fvsd.us/',
                        'title' => 'Masuda Middle School',
                        'htmlSnippet' => 'Kazuo <b>Masuda</b> serves 6-8th grade students and is part of Fountain Valley SD.',

                    ],
                ]
            ];

        }

        return view('index', [
            'my_arr' => $my_arr,
            'start' => $start,
        ]);
    }
}
