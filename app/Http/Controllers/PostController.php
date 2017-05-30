<?php

  namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Like;
  class PostController extends Controller{


    public function dashboard(){

      $posts=Post::orderBy('created_at','desc')->get();
      return view('dashboard')->with('posts',$posts);
    }

    public function delete($post_id){
      $post=Post::where('id',$post_id)->first();
      if(Auth::user() != $post->user){
        return redirect()->route('dashboard')->with('errors','you are not allowed to deltet other user posts');
      }
      $post->delete();
      return redirect()->route('dashboard')->with('message','the post has be been deleted');
    }

public function image($filename){

$file=Storage::disk('local')->get($filename);
return new Response($file,200);
}
public function create(Request $request){

  $this->validate($request,[
    'body'=>'required|min:5',
  ]);

  $post =new Post();
  $post->body=$request['body'];

if ( $request->user()->posts()->save($post)){
  $message="congrats the post just got posted";
}
  return redirect()->route('dashboard')->with('message',$message);
}

public function edit($post_id){

  $post=Post::where('id',$post_id)->first();
  if(Auth::user()  != $post->user ){
    return  redirect()->route('dashboard');
  }
  return view('renamepost')->with('post',$post);
}

public function update(Request $request,$post_id){

$post=Post::where('id',$post_id)->first();
  if(Auth::user() != $post->user){
    return  redirect()->route('dashboard');
    }
    $this->validate($request,[
      'body'=>'required|min:5',
    ]);
    $post->body=$request['body'];
$post->update();
    return redirect()->route('dashboard');
}
public function like(Request $request){
$post_id=$request['postid'];
$is_like=$request['islike'] === 'true' ? true : false;
$update= false;
$post=Post::find($post_id);
if(!$post){
  return null;
}
$user=Auth::user();
$like=$user->likes()->where('post_id',$post_id)->first();
if($like){
  $alredy_like=$like->like;
  $update=true;
  if($alredy_like==$is_like){
    $like->delete();
    return null;
  }
}else{

  $like=new Like();
}

$like->like=$is_like;
$like->user_id=$user->id;
$like->post_id=$post->id;
if($update){
  $like->update();
}else{
  $like->save();
}
return null;
}



  }
