<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        return view('students.index');
    }

    public function indexsave(Request $request){
        $data = $request->validate([
            'name'=> 'required',
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        Register::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Hashing the password
        ]);

        return redirect(route('students.login'));

    }

    public function login(){
        return view ('students.login');
    }

    public function loginsave(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)){
            return redirect(route('students.nextindex'));
        }
        else {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }
    
    public function nextindex(){
        if(Auth::check()){
            return view('students.nextindex');
        }
        else{
            return redirect(route('students.login'));
        }
    }


    // public function nextindex(){
    //     $registers = Register::all();
    //     return view('students.nextindex', ['registers' => $registers]);

    // }

    // public function store(Request $request){
    //     $data = $request->validate([
    //         'name'=> 'required',
    //         'email' => 'required|email',
    //         'password'=> 'required'
    //     ]);

    //     $newdata = Register::create($data);

    //     return redirect(route('students.nextindex'));
    // }

    public function edit(Register $register){
        return view('students.edit',['register'=>$register]);
    }

    public function update(Register $register , Request $request ){
        $data = $request->validate([
            'name'=> 'required',
            'email' => 'required|email',
        ]);

        $register -> update($data);

        return redirect(route('students.nextindex'))->with('succes','Updated succesfully');
    }

    public function destroy(Register $register){
        $register -> delete();

        return redirect(route('students.nextindex'))->with('succes','Deleted Succesfully');
    }
    

    

}
