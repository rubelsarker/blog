@extends('main')
@section('title','Create New Post')
@section('stylesheets')
    <link rel="stylesheet" href="{{url('')}}/frontend/css/parsely.css">
    <link rel="stylesheet" href="{{url('')}}/frontend/css/select2.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(['route' => 'posts.store','method' => 'post','data-parsley-validate' => '']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', null, array_merge(['class' => 'form-control','required'=>'','minlength'=>"6"])) }}
            </div>
            <div class="form-group">
                {{ Form::label('slug', 'Slug') }}
                {{ Form::text('slug', null, array_merge(['class' => 'form-control','required'=>'','minlength'=>"5",'maxlength'=>"255"])) }}
            </div>
            <div class="form-group">
                {{ Form::label('category_id', 'Category') }}
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                {{ Form::label('tags', 'Tag') }}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Post Body') }}
                {{ Form::textarea('body', null, array_merge(['class' => 'form-control','required'=>''])) }}
            </div>
            <div class="form-group">

                {{ Form::submit('Create Post', array_merge(['class' => 'btn btn-success btn-block'])) }}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="{{url('')}}/frontend/js/parsely.min.js"></script>
    <script src="{{url('')}}/frontend/js/select2.js"></script>
    <script>
        $('.select2-multi').select2();
    </script>
@endsection
