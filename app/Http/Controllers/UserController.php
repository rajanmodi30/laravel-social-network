<?php

  namespace App\Http\Controllers;
  use  File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
  class UserController extends Controller{


    public function image($filename){

    $file=Storage::disk('local')->get($filename);
    return new Response($file,200);
    }

public function index(){
if(Auth::user()){
  return redirect()->route('dashboard');
}
  return view('index');
}

public function getaccount(){

  return view('account')->with('user',Auth::user());
}



public function signup(Request $request){

$this->validate($request,[
  'email'=>'required|unique:users',
  'password'=>'required|min:5',
  'name'=>'required|max:20',
]);

$user=new User();
$user->email=$request['email'];
$user->password=bcrypt($request['password']);
$user->name=$request['name'];
$user->save();
Auth::login($user);
return redirect()->route('dashboard');

}
public function postaccount(Request $request,$user_id){

$this->validate($request,[
  'name'=>'required',
]);

  $user=Auth::user();
  $user->name=$request['name'];
  $user->update();
  $file=$request->file('file');
  $filename=$request['name'].'-'.$user->id.'jpg';
if($file){
  Storage::disk('local')->put($filename,File::get($file));
}


return redirect()->route('dashboard')->with('message','Congrats The Acoount Has Be Been Updates');
}

public function login(Request $request){

  $this->validate($request,[
    'email'=>'required',
    'password'=>'required',
  ]);
if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
  return redirect()->route('dashboard');
}
return redirect()->back();
}

public function logout(){

  Auth::logout();

  return redirect()->route('home');
}


  }
