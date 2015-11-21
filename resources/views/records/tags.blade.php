@extends('layouts.main')

@section('content')
    <div class="header">
        <h1>{{ $tag->name }}</h1>
    </div>
    <div class="section-layout">
        <div class="content">
            <div class="posts">
                @include('records._records_list', array('records'=>$tag->records))
            </div>
        </div>
    </div>
@endsection