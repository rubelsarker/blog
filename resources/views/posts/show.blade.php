@extends('main')
@section('title','view Post')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p class="lead">{{$post->body}}</p>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="badge badge-secondary">{{$tag->name}}</span>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-md-12">
                            <dl>
                                <dt>Url:</dt>
                                <dd><a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a></dd>
                            </dl>
                            <dl>
                                <dt>Category:</dt>
                                <dd>{{$post->category->name}}</dd>
                            </dl>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <dl>
                                <dt>Created At:</dt>
                                <dd>{{date('M j, Y h:ia',strtotime($post->created_at))}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl>
                                <dt>Updated  At:</dt>
                                <dd>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</dd>
                            </dl>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                            {{--<a class="btn btn-primary btn-block">Edit</a>--}}
                        </div>
                        <div class="col-md-6">
                            {!! Form::open(['route' => ['posts.destroy',$post->id],'method' => 'DELETE']) !!}
                            {!! Form::submit('DELETE',['class'=>'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}
                        </div>

                        <div class="col-md-12">
                            <br>
                            <a class="btn btn-info btn-block" href="{{route('posts.index')}}">view all post</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection