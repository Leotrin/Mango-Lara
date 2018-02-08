<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(){
        //Here use middleware better that using if condition
        if(auth()->user()->role == 'admin'){
            $users = User::all();
            return view('admin.pages.users',compact('users'));
        }
        return redirect('/home');
    }
    public function activate($id){
        //Here use middleware better that using if condition
        if(auth()->user()->role == 'admin'){
            $user = User::find($id);
            if($user!=null){
                $user->status = 1;
                $user->save();
            }
            return redirect('/users');
        }
        return redirect('/home');
    }
    public function deactivate($id){
        //Here use middleware better that using if condition
        if(auth()->user()->role == 'admin'){
            $user = User::find($id);
            if($user!=null){
                $user->status = 0;
                $user->save();
            }
            return redirect('/users');
        }
        return redirect('/home');
    }
    public function edit($id){
        //Here use middleware better that using if condition
        if(auth()->user()->role == 'admin'){
            if(request()->isMethod('post')){

                $this->validator(request()->all())->validate();

                $user = User::find(auth()->user()->id);
                $user->name     = request('name');
                $user->email    = request('email');
                $user->birthday = request('birthday');
                $user->password = bcrypt(request('password'));
                $user->save();
                return redirect('/users');
            }
            $user = User::find($id);
            return view('admin.pages.update_user',compact('user'));
        }
        return redirect('/home');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
