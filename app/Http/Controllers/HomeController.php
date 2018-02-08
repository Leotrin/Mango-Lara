<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.dashboard');
    }
    public function account_settings()
    {
        return view('admin.pages.account_settings');
    }
    public function save_account_settings(){
        $this->validator(request()->all())->validate();

        $user = User::find(auth()->user()->id);
        $user->name     = request('name');
        $user->email    = request('email');
        $user->birthday = request('birthday');
        $user->password = bcrypt(request('password'));
        $user->save();
        return redirect('account_settings');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function my_profile()
    {
        return view('admin.pages.profile');
    }
}
