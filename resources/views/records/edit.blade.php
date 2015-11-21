@extends('layouts.main')

@section('content')
    <h1>Edit the Record</h1>

    {!! Form::model($record, ['method' => 'PATCH', 'action' => ['RecordsController@update', $record->id]]) !!}

    @include('records._form', ['submitButtonText' => 'Edit Record'])

    {!! Form::close() !!}

    @include('errors.list')

@stop