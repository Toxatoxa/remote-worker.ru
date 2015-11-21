@extends('layouts.main')

@section('content')
    <h1>Add a new Category</h1>

    {!! Form::model($category, ['url' => 'categories']) !!}

    @include('categories._form', ['submitButtonText' => 'Add Category'])

    {!! Form::close() !!}

    @include('errors.list')

@stop