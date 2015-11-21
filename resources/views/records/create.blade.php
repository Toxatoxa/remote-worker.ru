@extends('layouts.main')

@section('content')
    <h1>Write a new record</h1>

    {!! Form::model($record, ['url' => 'records']) !!}

    @include('records._form', ['submitButtonText' => 'Add Record'])

    {!! Form::close() !!}

    @include('errors.list')

@stop