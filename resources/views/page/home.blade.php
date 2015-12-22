@extends('layouts.main')

@section('content')
    <div alt="Определить Ваше местоположение" id="location">
        <button class="mylocation"><div></div></button>
    </div>
    <div id="zoom">
        <button  class="zoom-in" alt="Увеличить"><div></div></button>
        <button  class="zoom-out" alt="Уменьшить"><div></div></button>
    </div>
    <div id="maptype" class="roadmap" alt="Сменить тип отображения карты"><div></div></div>
    <div id="map"></div>
@endsection