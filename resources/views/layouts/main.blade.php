<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="keywords" content="карта мальты, карта отелей мальты, мальта, карта мальты на русском, пляжи мальты, отели мальты, бронирование отелей, дешевые отели"/>
        <meta name="description" content="Интерактивная карта Мальты. Карта Мальты с отелями на русском языке. А также все достопримечательности."/>
        <title>MaltaMap.info - Интерактивная карта Мальты. Карта Мальты с отелями на русском языке. А также все достопримечательности.</title>
        @if(Auth::check())
        <link href="{{ elixir('css/admin.css') }}" type="text/css" rel="stylesheet">
        @else
        <link href="{{ elixir('css/all.css') }}" type="text/css" rel="stylesheet">
        @endif
        <script src="//maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script>
            mapCenter = [35.889469, 14.442760];
            mapType = google.maps.MapTypeId.ROADMAP;
            mapZoom = 12;
        </script>
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



    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-71628715-1', 'auto');
        ga('send', 'pageview');

    </script>
    <script type="text/javascript" src="http://samuimap.info/static/js/googlemaps/infobox_packed.js"></script>
    <script type="text/javascript" src="http://samuimap.info/static/js/googlemaps/infobubble.js"></script>
    <script type="text/javascript" src="http://samuimap.info/static/js/googlemaps/markerclusterer_compiled.js"></script>

    <script type="text/javascript" src="http://samuimap.info/static/js/gmap.js"></script>
    <script type="text/javascript" src="http://samuimap.info/static/js/general.js"></script>

        @yield('footer')
    </body>
</html>
