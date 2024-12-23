<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterForm()
{
    return view('register');
}

    public function register (Request $request){
        $users = session('users',[]);

        $validatedata = $request-> validate(
            [
                'name'=>'required|string|max:200',
                'email'=> 'required|email|unique:users,email',
                'password'=> 'required|string|min:5',
            ]
            );

        $users[] = [
            'name'=> $validatedata['name'],
            'email'=>$validatedata['email'],
            'password'=>bcrypt($validatedata['password'])
        ];

        session(['users' => $users]);

        return redirect('/login');
    }


    public function showlogin(){
        return view('login');
    }

    public function login(Request $request){

        $users = session('users', []);

        $validatedata = $request-> validate(
            [

                'email' => 'required|email',
                'password'=> 'required|string',
            ]);

        foreach ($users as $user) {
            if ($user['email'] === $validatedata['email'] && Hash::check($validatedata['password'], $user['password'])) {

                session(['logged_in_user' => $user]);

                return redirect('/dashboard');
            }
            return back()-> withErrors(['error' => 'Invalid Credentials']);
        }
        
    }

    public function showdash (){
        $user = session('logged_in_user');

        if (!$user) {
            return redirect('/login');
        }
        return view ('dashboard',['user'=>$user]);
    }

    public function logout(){
        session() -> forget('logged_in_user');
        return redirect('/login');
    }

    
}
