<?php

namespace App\Services;

class GoogleService{

    // Googleの検索結果を取得
    public static function search_google_list($request,$start=1)
    {
        //APIキー
        $api_key = config('google.google_api_key');

        //検索エンジンID
        $engine_id = config('google.engine_id');

        //URL
        $url = config('google.custom_search_url');

        //入力されたキーワード
        $query = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');

        $param_arr = array(
            'key' => $api_key,
            'cx' => $engine_id,
            'q' => $query,
            'alt' => 'json',
            'start' => $start,
            'excludeTerms' => 'pdf uploads'
        );
        $param = http_build_query($param_arr);
        $request_url = $url . $param;

        //リクエストURL→JSON取得→連想配列に
        $my_json = file_get_contents($request_url, true);
        $my_arr = json_decode($my_json, true);

        return $my_arr;

    }
}