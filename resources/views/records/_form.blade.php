<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, null, ['id'=>'category_id','class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id'=>'tag_list','class'=>'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script>

        $("#category_id").select2({
            placeholder: 'Choose Category',
            minimumResultsForSearch: Infinity,
        });

        $("#tag_list").select2({
            placeholder: 'Choose Tags',
            tags : true,
        });
    </script>
@endsection