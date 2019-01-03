@extends('layouts.master')

@section('content')
{{-- Displays Error Messages --}}
@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <span>{{ $errors->first() }}</span>
  </div>
@endif

<div class="jumbotron jumbotron-fluid">
  <div class="containerform">
    <row>
      <h1 class="col-md-4 col-md-offset-4">LOGIN</h1>
    </row>
    <row>
    <div class="col-md-4 col-md-offset-4">
      {!! Form::open(['route' => 'login.store']) !!}
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password...">
        </div>
        <button type="submit" class="btn btn-primary" value="login">Login</button>
        <a class="btn btn-info" href="{{route('signup.show')}}" role="button">Create An Account</a>
      {!! Form::close() !!}
      </row>
    </div>
  </div>
</div>
@section('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection

@endsection
