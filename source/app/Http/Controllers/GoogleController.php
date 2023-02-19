<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleService;

class GoogleController extends Controller
{
    public function index(Request $request)
    {
        //取得スタート位置
        $start = $request->input('start',null);

        //
        if($start>91){
            $start=91;
        }elseif($start<1){
            $start =1;
        }

        //検索ワード
        $search = $request->input('search',null);
        $total_results=null;
        $count=null;
        //検索結果変数
        $my_arr = [];
        if (isset($request->search)) {
            $my_arr = GoogleService::search_google_list($search, $start);
//            dd($my_arr);
//            $my_arr = [
//                'queries' => [
//                    'nextPage' => [
//                        0 => [
//                            "title" => "Google Custom Search - 桝田",
//                            "totalResults" => "7470000",
//                            "searchTerms" => "桝田",
//                            "count" => 10,
//                            "startIndex" => 11,
//                            "inputEncoding" => "utf8",
//                            "outputEncoding" => "utf8",
//                            "safe" => "off",
//                            "cx" => "e7569735cd6de4dda",
//                            "excludeTerms" => "pdf uploads",
//                        ]
//                    ],
//                ],
//                'items' => [
//                    0 => [
//                        'link' => 'https://en.wikipedia.org/wiki/Junichi_Masuda',
//                        'title' => 'Junichi Masuda - Wikipedia',
//                        'htmlSnippet' => 'Junichi <b>Masuda</b> is a Japanese video game composer, director, designer, producer, singer, programmer and trombonist, best known for his work in the Pokémon',
//                    ],
//                    1 => [
//                        'link' => 'https://masuda.fvsd.us/',
//                        'title' => 'Masuda Middle School',
//                        'htmlSnippet' => 'Kazuo <b>Masuda</b> serves 6-8th grade students and is part of Fountain Valley SD.',
//
//                    ],
//                ]
//            ];
            $queries = $my_arr['queries']['request'][0];
            $total_results=$queries['totalResults'];
            $count=$queries['count'];
        }

        return view('index', [
            'search' => $search, //検索ワード
            'my_arr' => $my_arr, //検索結果
            'start' => $start,//検索初期値
            'total_results' => number_format($total_results),//検索取得数
            'count' => $count,//検索初期値
        ]);
    }
}
