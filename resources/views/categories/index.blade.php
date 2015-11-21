@extends('layouts.main')

@section('content')

    <h1>Categories</h1>
    <hr>

    <a class="btn btn-small btn-success" href="{{ action('CategoriesController@create') }}">Add New</a>
    <br><br>
    <div class="panel panel-default">
        <div class="panel-heading">All Categories</div>
        <table class="table">
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->alias }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        {!! Form::open(array('url' => 'categories/' . $category->id, 'class' => 'pull-right')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}

                        <a class="btn btn-small btn-warning" href="{{ URL::to('categories/' . $category->id . '/edit') }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection