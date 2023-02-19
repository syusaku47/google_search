<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Google search</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
<div class="centering_parent">
    @if(empty($search))

    <div class="centering_item">
        <div class="main_title">
            <h1>Google</h1>
        </div>
        <form class="top_form" method="GET" action="{{ route('google.index') }}">
            <input class="input-area" type="search" placeholder="Googleで検索" name="search"
                   value="@if (isset($search)){{$search}}@endif">
            <button type="submit">検索</button>

            <input type="hidden" name="start" value="1">
        </form>
    </div>
</div>

@else
<div class="menu_item">
    <div>
        <a href="{{ route('google.index') }}" style="text-decoration:none;">Google</a>
    </div>
    <div class="form">
        <form method="GET" action="{{ route('google.index') }}">
            <input class="menu-input-area" type="search" placeholder="Googleで検索" name="search"
                   value="@if (isset($search)){{$search}}@endif">
            <button type="submit">検索</button>
            <input type="hidden" name="start" value="1">
        </form>

    </div>
</div>
<div class="left_item">
    @if(empty($my_arr['items']))
    <p>検索結果は 0 件です。</p>
    @else


    <div class="search_result">
        <span>検索結果</span>
        <span>{{$total_results}}&nbsp;件</span>
    </div>
    @foreach ($my_arr['items'] as $index => $value)
    <div>
        <dl>
            <dt>
                <a href="{{ $value['link']}}">{{ $value['title']}}</a>
            </dt>
            <dd><a href="{{ $value['link']}}">{{ $value['link']}}</a></dd>
            <dd>{!! $value['htmlSnippet']!!}</dd>
        </dl>
    </div>
    @endforeach

    <div class="form">

        @if($start > 0)
        <div class="button_centering">
            <div class="inline-from">
                <form method="GET" action="{{ route('google.index') }}">
                    <input type="hidden" name="search" value="{{$search}}">
                    <input type="hidden" name="start" value="{{$start-10}}">
                    <button type="submit">前へ</button>
                </form>
            </div>
            <div class="inline-from">
                <form method="GET" action="{{ route('google.index') }}">
                    <input type="hidden" name="search" value="{{$search}}">
                    <input type="hidden" name="start" value="{{$start+10}}">
                    <button type="submit">次へ</button>
                </form>
            </div>
        </div>
        @endif


    </div>
    @endif
    @endif
</body>
</html>
