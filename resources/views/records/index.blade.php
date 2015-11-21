@extends('layouts.main')

@section('content')

    <h1>Records</h1>

    <hr>

    @if(Auth::check())
    <a class="btn btn-small btn-success" href="{{ action('RecordsController@create') }}">Add New</a>
    <br><br>
    @endif

    @foreach($articles as $article)
        <article>
            <h2>
                <a href="{{ $article->url }}" target="_blank" onclick="trackOutboundLink('{{ $article->title }}')">{{ $article->title }}</a>
            </h2>
            <h5>Tags:</h5>

            <ul>
            @foreach($article->tags as $tag)
            <li><a href="{{ action('TagController@index', $tag->name) }}">{{ $tag->name }}</a></li>
            @endforeach
            </ul>
            <div class="body">{{ $article->body }}</div>

            @if(Auth::check())
                <br>
                <a class="btn btn-small btn-success" href="{{ action('RecordsController@edit', $article->id) }}">Edit Article</a>
                <br><br>
            @endif

        </article>
    @endforeach

@endsection