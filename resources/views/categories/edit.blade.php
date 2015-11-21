@extends('layouts.main')

@section('content')
    <h1>Edit Category</h1>

    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoriesController@update', $category->id]]) !!}

    @include('categories._form', ['submitButtonText' => 'Edit Category'])

    {!! Form::close() !!}

    @include('errors.list')

@stop