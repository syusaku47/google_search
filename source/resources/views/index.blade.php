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
        <div class="form">
            <form method="GET" action="{{ route('google.index') }}">
                <input class="input-area" type="search" placeholder="Googleで検索" name="search"
                       value="@if (isset($search)) {{$search}} @endif">
                <button type="submit">検索</button>

            </form>
        </div>
    </div>
</div>

@else
<div class="left_item">
    @if(empty($my_arr['items']))
    <p>検索結果は 0 件です。</p>
    @else

    <div class="form">
        <form method="GET" action="{{ route('google.index') }}">
            <input class="input-area" type="search" placeholder="Googleで検索" name="search"
                   value="@if (isset($search)) {{$search}} @endif">
            <button type="submit">検索</button>
        </form>
    </div>

    <p>検索結果</p>
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
        <div class="inline-from">
            <form method="GET" action="{{ route('google.index') }}">
                <input type="hidden" name="search" value="{{$search}}">
                <input type="hidden" name="start" value="{{$start-1}}">
                <button type="submit">前へ</button>
            </form>
        </div>
        @endif
        <div class="inline-from">
            <form method="GET" action="{{ route('google.index') }}">
                <input type="hidden" name="search" value="{{$search}}">
                <input type="hidden" name="start" value="{{$start+1}}">
                <button type="submit">次へ</button>
            </form>
        </div>
    </div>
    @endif
    @endif
</body>
</html>
