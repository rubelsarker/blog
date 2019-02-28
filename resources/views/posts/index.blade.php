@extends('main')
@section('title','all Post')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1> All Post</h1>
        </div>
        <div class="col-md-2">
            <a href="{{route('posts.create')}}" class="btn mt-2 btn-primary btn-block">Create New Post</a>

        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{substr($post->body,0,50)}}{{strlen($post->body) > 50?'...':''}}</td>
                        <td>{{date('M j, Y',strtotime($post->created_at))}}</td>
                        <td>
                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-sm">View</a>
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <div class="paginate-style">
               {!! $posts->links(); !!}
            </div>
        </div>
    </div>

@endsection