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
</div>
</body>
</html>
