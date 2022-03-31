<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\users;

class userController extends Controller
{
    public function index()
    {
        $data = users :: get();

        return view('users.index',['data' => $data]);
    }
    
    public function create(){
        return view('admin.create');
    }

    public function store (Request $request){
        $data = $this->validate($request,[
            "name" => "required|min:3",
            "email" => "required|email|unique:users",
            "password" => ["required",Password::min(6)->letters()]
        ]);
          $data['password'] = bcrypt($data['password']);
          $op = users :: create($data);
          if($op){
              $message = "Raw inserted";
          }else{
              $message = "Error try again";
          }
          session()->flash('message',$message);
          return redirect(url('/all/'));
    }

    public function edit($id){
        $data = users :: find($id);
        return view('admin.edit',['data' => $data]);
    }

    public function update (Request $request,$id){
        $data = $this->validate($request,[
            "name" => "required",
            "email" => "required|email"
        ]);
        $op = users:: where('id',$id)->update($data);
        if($op){
            $message = "Raw updated";
        }else{
            $message = "Error at update";
        }
        session()->flash('Message',$message);
        return redirect(url('/all/'));
    }

    public function delete ($id){
        $op = users:: where('id',$id)->delete();
        if($op){
            $message = "Deleted successfully";
        }else{
            $message = "canot delete the data right now";
        }
        session()->flash('Message',$message);

        return redirect(url('/all/'));
    }

    public function login(){
        return view('admin.login');
    }

    public function dologin(Request  $request){
      $data =$this->validate($request,[
          "email" => "required|email",
          "password" => ["required",Password::min(6)->letters()]
      ]);
      if(auth()->attempt(($data))){
          return redirect((url('all')));
      }else{
        session()->flash('Message','Error IN yOUR Cred Try Again');
        return  redirect(url('/Login/'));
      }
    }

    public function logout(){
        auth()->Logout();
        return redirect(url('/Login/'));
    }
}
