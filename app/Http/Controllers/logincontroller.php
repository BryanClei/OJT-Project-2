<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class logincontroller extends Controller
{
    public function index() {
        return view('welcome');
    }
    public function register() {

        return view('login.register');
    }
    public function validate_registration(Request $request) {
        
        $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => [
                'required', 'string', 'confirmed',
                Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ],
            'password_confirmation' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'contact' => 'required|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'gender' => 'required'
        ]);

        $data = $request->all();

        User::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'contact' => $data['contact'],
            'street' => $data['street'],
            'barangay' => $data['barangay'],
            'city' => $data['city'],
            'province' => $data['province'],
            'gender' => $data['gender']
        ]);

        return redirect('/')->with('success', 'Registration Complete, Now you can login');
    }

    public function validate_login(Request $request) {

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)){
            if(Auth::user()->role==0){
                return redirect('login/dashboard');
            }elseif(Auth::user()->role==1){
                return redirect('login/manager');
            }else{
                return redirect('login/user');
            }
        }

        return redirect('/')->with('success', 'Login details are not valid! <br> Check your Password or Username');

    }

    public function dashboard(){

        if(Auth::check()){
            if(Auth::user()->role == 0){
                $name = Auth::user();
                return view('login/dashboard', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
    }

    public function manager(){
        
        if(Auth::check()){
            if(Auth::user()->role == 1){
                $name = Auth::user();
                return view('login/manager',['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
    }

    public function user(){

        if(Auth::check()){
            if(Auth::user()->role == 2){
                $name = Auth::user();
                return view('login/user', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
    }

    public function logout() {

        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}
