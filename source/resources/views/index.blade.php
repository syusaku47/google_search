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
    @if(empty($my_arr))

    <div class="centering_item">
        <div class="main_title">
            <h1>Google</h1>
        </div>
        <div class="form">
            <form method="GET" action="{{ route('google.index') }}">
                <input class="input-area" type="search" placeholder="ユーザー名を入力" name="search"
                       value="@if (isset($search)) {{ $search }} @endif">
                <div>
                    <button type="submit">検索</button>
                    <button>
                        <a href="{{ route('google.index') }}" class="text-white">
                            クリア
                        </a>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div>
        @else
            @foreach ($my_arr['items'] as $index => $value)
            <li>
                <dl>
                    <dt>
                        <a href="{{ $value['link']}}">{{ $value['title']}}</a>
                    </dt>
                    <dd><a href="{{ $value['link']}}">{{ $value['link']}}</a></dd>
                    <dd>{{ $value['htmlSnippet']}}</dd>
                </dl>
            </li>
            $start++;
            @endforeach
        @endif

    </div>
</div>
</body>
</html>
