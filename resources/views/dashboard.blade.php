@extends('layouts.master')


@section('title')
  dashboard
@endsection


@section('content')
@include('errors.error')

<form  action="{{ route('postcreate') }}" method="post">
<div class="row">

    <textarea  class="form-control" placeholder="Write Your Thoghts Here" name="body" rows="5" cols="80"></textarea>
  <input type="hidden" name="_token" value="{{ Session::token()}}">

</div><br />
<div class="row">
  <button type="submit" class="btn btn-primary" name="button">Submit</button>
</div>
</form>
<hr />
<div class="row">
  <h1>What Other People Say</h1>
</div>

@foreach ($posts as $post)
<div class="row">

<div class="row" id="lol" >
{{ $post->body }}
</div><div class="row">
  Posted By:{{ $post->user->name}}   {{ $post->created_at}}
</div>

<div class="row">
  <div class="col-md-1" data-postid="{{ $post->id }}">
    <a href="#" class="like" >{{ Auth::user()->likes()->where('post_id',$post->id)->first()?Auth::user()->likes()->where('post_id',$post->id)->first()->like == '1' ?'You Liked it':'Like':'Like'}}</a>
    <a href="#" class="like" >{{ Auth::user()->likes()->where('post_id',$post->id)->first()?Auth::user()->likes()->where('post_id',$post->id)->first()->like == '0' ?'You Disliked it':'Dislike':'Dislike'}}</a>
  </div>

  @if (Auth::user() == $post->user)

  <div class="col-md-1">

    <a href="{{ action('PostController@edit',$post->id) }}" >Edit</a>

  </div>
  <div class="col-md-1">
    <a href="{{ action('PostController@delete',$post->id) }}">Delete</a>
  @endif

  </div>
</div>
</div>

<br /><br /><br />


@endforeach

<script  src="https://code.jquery.com/jquery-3.2.1.min.js">
</script>

        <script src="{{ URL::to('src/js/app.js') }}"></script>
<script>
var token='{{ Session::token() }}';
var like='{{ route('like')}}';
</script>
@endsection
