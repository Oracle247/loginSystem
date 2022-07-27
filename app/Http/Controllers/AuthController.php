<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $user =User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect()->route('dashboard');
            } else {
                return back()->with(['email' => 'Password not matched']);
            }
        } else {
            return back()->with(['email' => 'User not found']);
        }

    }

    public function registerUser(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:5|max:12',
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with(['fail' => 'Something went wrong']);
        }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
    
}
