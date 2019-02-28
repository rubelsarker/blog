@extends('main')
@section('title','Homepage')
@section('content')
    <div class="row">
        <div class="jumbotron">
            <h1 class="display-4">Welcome To My Blog</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{$post->title}}</h3>
                    <p class="text-muted">{{substr($post->body,0,300)}}{{strlen($post->body) > 300?'...':''}}</p>
                    <a class="btn btn-primary" href="{{url('blog/'.$post->slug)}}">Read More</a>
{{--                    {{route('pages.single',$post->id)}}--}}
                    <hr>
                </div>
            @endforeach



        </div>
        <div class="col-md-3 offset-md-1">
            <div class="sidebar">
                <h2>sidebar</h2>
            </div>
        </div>
    </div>

@endsection