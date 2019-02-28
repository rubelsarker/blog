@extends('main')
@section('title','Contact')
@section('content')
    <div class="row">

      <div class="col-md-12">
          <h2 class="text-center">contact us</h2>
        <form action="{{route('contact.post')}}" method="post">
            {{csrf_field()}}

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control"  name="email"  placeholder="Enter email">

            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control"  name="subject" placeholder="Name"/>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <input type="text" class="form-control"  name="message" placeholder="Message...">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
@endsection