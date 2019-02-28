@extends('main')
@section('title','edit Post')
@section('stylesheets')
    <link rel="stylesheet" href="{{url('')}}/frontend/css/select2.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">

        {!! Form::model($post,['route'=>['posts.update',$post->id],'method' => 'PUT']) !!}

        <div class="col-md-8">

            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array_merge(['class' => 'form-control'])) }}
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', null, array_merge(['class' => 'form-control'])) }}
            {{ Form::label('category_id', 'Category') }}
            {{ Form::select('category_id',$categories, null, array_merge(['class' => 'form-control'])) }}
            {{ Form::label('tags', 'Tags') }}
            {{ Form::select('tags',$tags, null, array_merge(['class' => 'select2-multi form-control','multiple'=>'multiple'])) }}
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body',null, array_merge(['class' => 'form-control'])) }}


        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-md-6">
                            <dl>
                                <dt>Created At:</dt>
                                <dd>{{date('M j, Y h:ia',strtotime($post->created_at))}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>Updated  At:</dt>
                                <dd>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</dd>
                            </dl>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                            {{--<a class="btn btn-danger btn-block">Edit</a>--}}
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Save Change',['class'=>'btn btn-success btn-block']) !!}

                        </div>
                    </div>

                </div>
            </div>
        </div>
        {!! Form::close() !!}


        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{url('')}}/frontend/js/select2.js"></script>
    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!!json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection