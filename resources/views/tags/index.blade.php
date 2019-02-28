@extends('main')
@section('title',"| All Tags")
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-1">
            <h1>All Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>

                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class="com-md-3">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'tags.store','method' => 'post']) !!}
                    <h2>New Tag</h2>
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, array_merge(['class' => 'form-control'])) }}
                    </div>

                    <div class="form-group">

                        {{ Form::submit('Create New Tag', array_merge(['class' => 'btn btn-info btn-block'])) }}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endSection