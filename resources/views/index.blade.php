@extends('layouts.master')


@section('title')

@endsection


@section('content')

@include('errors.error')

  <div class="row">
    <div class="col-md-6">


      <h1>Sign Up Here</h1>
      <form method="post" action="{{ route('signup')}}" >
        <div class="form-group">
          <label for="exampleInputEmail1">Email address:</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ Request::old('email') }}"placeholder="Email">
        </div>

        <div class="form-group">
          <label for="exampleInputFile">First Name:</label>
          <input type="text" class="form-control"name="name" id="exampleInputFile" value="{{ Request::old('name')}}"placeholder="First Name">
            </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password:</label>
          <input type="password"  name="password"class="form-control" id="exampleInputPassword1" value="{{ Request::old('password')}}" placeholder="Password">
        </div>
        <input type="hidden" name="_token" value="{{ Session::token() }}"  />
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
    <div class="col-md-6">
      <h1>Or Login Here</h1>

      <form method="post" action="{{ route('login') }}" >
        <div class="form-group">
          <label for="exampleInputEmail1">Email address:</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" value="{{ Request::old('email')}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password:</label>
          <input type="password"  name="password"class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{ Request::old('password')}}">
        </div>

        <input type="hidden" name="_token" value="{{ Session::token() }}"  />
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

@endsection
