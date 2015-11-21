@extends('layouts.main')

@section('content')
    <div class="header">
        <h1>{{ $category->title }}</h1>
        <h2>
            {{ $category->description }}
        </h2>
        <div class="header_sep"></div>
    </div>
    <div class="section-layout">
        <div class="content">
            <div class="posts">
                @include('records._records_list', array('records'=>$category->records))
            </div>
        </div>
    </div>
@endsection