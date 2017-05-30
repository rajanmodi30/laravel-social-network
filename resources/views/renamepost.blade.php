@extends('layouts.master')


@section('title')
 Edit
@endsection


@section('content')


  <form  action="{{ action('PostController@update',$post->id) }}" method="post">
  <div class="row">

      <textarea  class="form-control" placeholder="{{ $post->body}}" name="body" rows="5" cols="80"></textarea>
    <input type="hidden" name="_token" value="{{ Session::token()}}">

  </div><br />
  <div class="row">
    <button type="submit" class="btn btn-primary" name="button">Update</button>

  </div>
  </form>


@endsection
