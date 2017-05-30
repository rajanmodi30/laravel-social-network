@extends('layouts.master')

@section('title')
  Account
@endsection


@section('content')
  <form method="post" action="{{ action('UserController@postaccount',$user->id)}}" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">First Name:</label>
      <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ Request::old('email') }}"placeholder="{{ $user->name }}">
    </div>

    <div class="form-group">
      <input type="file" class="form-control" name="file" id="exampleInputFile" >
    </div>
    <input type="hidden" name="_token" value="{{ Session::token() }}"  />
    <button type="submit" class="btn btn-primary">Save </button>
  </form>

  @if(Storage::disk('local')->has($user->name).'-'.$user->id.'jpg')
<div class="row">
<input type="hidden"{{ $filename=$user->name.'-'.$user->id.'jpg'}}
  ><img src="{{ action('UserController@image',$filename)}}" />
</div>
  @endif

@endsection
