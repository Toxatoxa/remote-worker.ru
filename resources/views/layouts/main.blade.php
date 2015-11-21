<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="Stay healthy while traveling and working remote. Calisthenics. Bodyweight exercises" name="description">
        <!--<base href="http://nodesk.co/">-->
        <title>Remote Worker | Все вещи цифрового бродяги</title>
        @if(Auth::check())
        <link href="{{ elixir('css/admin.css') }}" type="text/css" rel="stylesheet">
        @else
        <link href="{{ elixir('css/all.css') }}" type="text/css" rel="stylesheet">
        @endif
    </head>
    <body>

    @if(Auth::check())
        @include('partials.nav')
    @endif

    <div id="layout">
        @include('partials.menu')
        <div id="main">
            @include('partials.flash_messages')
            @yield('content')
        </div>
    </div>

        @if(Auth::check())
            <script src="{{ elixir('js/admin.js') }}"></script>
        @else
            <script src="{{ elixir('js/all.js') }}"></script>
        @endif

        @yield('footer')
    </body>
</html>
