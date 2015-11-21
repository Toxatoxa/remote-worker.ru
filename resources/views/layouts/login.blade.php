<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="Stay healthy while traveling and working remote. Calisthenics. Bodyweight exercises" name="description">
        <title>Remote Worker | Все вещи цифрового бродяги</title>
        <link href="{{ elixir('css/admin.css') }}" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @include('partials.flash_messages')
            @yield('content')
        </div>

        <script src="{{ elixir('js/all.js') }}"></script>
        @yield('footer')
    </body>
</html>
