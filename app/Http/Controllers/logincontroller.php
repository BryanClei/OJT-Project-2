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

        $firstname = $request->old('firstname');
        $middlename = $request->old('middlename');
        $surname = $request->old('surname');
        $email = $request->old('email');
        $username = $request->old('username');
        $gender = $request->old('gender');
        $contact = $request->old('contact');
        $street = $request->old('street');
        $barangay = $request->old('barangay');
        $city = $request->old('city');
        $province = $request->old('province');
        
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
            'gender' => $data['gender'],
            'role' => $data['role']
        ]);

        return redirect('/')->with('success', 'Registration Complete, Now you can login');
    }

    public function validate_admin_registration(Request $request) {

        $firstname = $request->old('firstname');
        $middlename = $request->old('middlename');
        $surname = $request->old('surname');
        $email = $request->old('email');
        $username = $request->old('username');
        $gender = $request->old('gender');
        $contact = $request->old('contact');
        $street = $request->old('street');
        $barangay = $request->old('barangay');
        $city = $request->old('city');
        $province = $request->old('province');
        $role = $request->old('role');
        
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
            'gender' => 'required',
            'role' => 'required'
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
            'gender' => $data['gender'],
            'role' => $data['role']
        ]);

        return redirect('login/admin/account')->with('success', 'Registration Complete, User can now login');
    }

    public function validate_login(Request $request) {

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)){
            if(Auth::user()->role==0){
                return redirect('login/admin/dashboard');
            }elseif(Auth::user()->role==1){
                return redirect('login/manager/manager');
            }else{
                return redirect('login/user/user');
            }
        }

        return redirect('/')->with('success', 'Login details are not valid! <br> Check your Password or Username');

    }

    public function dashboard(){

        if(Auth::check()){
            if(Auth::user()->role == 0){
                $name = Auth::user();
                return view('login/admin/dashboard', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
    }

    public function accounts(){

        if(Auth::check()){
            if(Auth::user()->role == 0){
                $name = Auth::user();
                return view('login/admin/account', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
    }

    public function viewprofile(){

        if(Auth::check()){
            if(Auth::user()->role == 0){
                $name = Auth::user();
                return view('login/admin/viewprofile', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
    }

    public function vmprofile(){

        if(Auth::check()){
            if(Auth::user()->role == 1){
                $name = Auth::user();
                return view('login/manager/vmprofile', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
    }

    public function vuprofile(){

        if(Auth::check()){
            if(Auth::user()->role == 2){
                $name = Auth::user();
                return view('login/user/vuprofile', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
    }

    public function update(Request $request, $id){

        $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'contact' => 'required|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'gender' => 'required'
        ]);

        $admin = User::find($id);

        $admin->firstname = request('firstname');
        $admin->middlename = request('middlename');
        $admin->surname = request('surname');
        $admin->birthday = request('birthday');
        $admin->contact = request('contact');
        $admin->street = request('street');
        $admin->barangay = request('barangay');
        $admin->city = request('city');
        $admin->province = request('province');
        $admin->gender = request('gender');
        $admin->update();
        return redirect('login/admin/viewprofile')->with('success', 'Account Updated Successfuly!');
    }

    public function updatemanager(Request $request, $id){

        $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'contact' => 'required|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'gender' => 'required'
        ]);

        $admin = User::find($id);

        $admin->firstname = request('firstname');
        $admin->middlename = request('middlename');
        $admin->surname = request('surname');
        $admin->birthday = request('birthday');
        $admin->contact = request('contact');
        $admin->street = request('street');
        $admin->barangay = request('barangay');
        $admin->city = request('city');
        $admin->province = request('province');
        $admin->gender = request('gender');
        $admin->update();
        return redirect('login/manager/vmprofile')->with('success', 'Account Updated Successfuly!');
    }

    public function updateuser(Request $request, $id){

        $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'contact' => 'required|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'gender' => 'required'
        ]);

        $admin = User::find($id);

        $admin->firstname = request('firstname');
        $admin->middlename = request('middlename');
        $admin->surname = request('surname');
        $admin->birthday = request('birthday');
        $admin->contact = request('contact');
        $admin->street = request('street');
        $admin->barangay = request('barangay');
        $admin->city = request('city');
        $admin->province = request('province');
        $admin->gender = request('gender');
        $admin->update();
        return redirect('login/user/vuprofile')->with('success', 'Account Updated Successfuly!');
    }

    public function updatepassword(){

        if(Auth::check()){
            if(Auth::user()->role == 0){
                $name = Auth::user();
                return view('login/admin/updatepassword', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
        
    }

    public function mchangepassword(){

        if(Auth::check()){
            if(Auth::user()->role == 1){
                $name = Auth::user();
                return view('login/manager/mchangepassword', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
        
    }

    public function uchangepassword(){

        if(Auth::check()){
            if(Auth::user()->role == 2){
                $name = Auth::user();
                return view('login/user/uchangepassword', ['user' => $name]);
            }else{
                return redirect('/')->with('success', 'you are not allowed to access');
            }
        }else{
            return redirect('/')->with('success', 'you are not allowed to access');
        }
        
    }

    public function updatepass(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => [
                'required', 'string', 'confirmed',
                Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ]
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function mupdatepass(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => [
                'required', 'string', 'confirmed',
                Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ]
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function uupdatepass(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => [
                'required', 'string', 'confirmed',
                Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ]
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function manager(){
        
        if(Auth::check()){
            if(Auth::user()->role == 1){
                $name = Auth::user();
                return view('login/manager/manager',['user' => $name]);
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
                return view('login/user/user', ['user' => $name]);
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
