@extends('layouts.main')

@section('content')

    <h1>{{ $category->title }}</h1>

    <h2>{{ $category->description }}</h2>

    <hr>

    @if(Auth::check())
        <a class="btn btn-small btn-success" href="{{ action('RecordsController@create') }}">Add New</a>
        <br><br>
    @endif

    @foreach($category->records as $record)
        <record>
            <h2>
                <a href="{{ $record->url }}" target="_blank" onclick="trackOutboundLink('{{ $record->title }}')">{{ $record->title }}</a>
            </h2>
            <h5>Tags:</h5>

            <ul>
                @foreach($record->tags as $tag)
                    <li><a href="{{ action('TagController@index', $tag->name) }}">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
            <div class="body">{{ $record->body }}</div>

            @if(Auth::check())
                <br>
                <a class="btn btn-small btn-success" href="{{ action('RecordsController@edit', $record->id) }}">Edit Record</a>
                <br><br>
            @endif

        </record>
    @endforeach

@endsection