@extends('main')
@section('title',"|  Tag")
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
           <h1>{{$tag->name}}Tag</h1>
        </div>
    </div>
@endSection