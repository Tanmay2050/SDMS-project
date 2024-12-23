<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Achievement;
use App\Models\Intership;
use App\Models\Courses;
use App\Models\Paper;



class StudentController extends Controller
{
    public function register(){
        return view('student.register');
    }

    public function registersave (Request $request){
        $data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'
        ]);

        // User::create([
        //     'name'=>$data['name'],
        //     'email'=> $data['email'],
        //     'password'=>Hash::make($data['password'])
        // ]);

        $user = User::create($data);

        return redirect(route('student.login'));
    }

//======================================================================================================================================================================

    public function login(){
        return view('student.login');
    }

    public function loginsave(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('student.dashboardsave');
        }
    }

//======================================================================================================================================================================

    public function dashboard(){
        return view('student.dashboard');
    }

    public function dashboardsave(){
        if (Auth::check()) {
            return view ('student.dashboard');
        }
        else {
            return redirect(route('student.login'));
        }
    }

    
    public function logout(){
        Auth::logout(); //end the user session and will return to login
        return view('student.login');
    }

//======================================================================================================================================================================

    public function dachieve(Request $request , Achievement $newentries)
    {
        // $entries = Achievement::all();
        $search = $request->input('search', '');
        if ($search != ""){
            $entries = Achievement::where('activity' ,'like', "%$search%")->where('user_id', Auth::user()->id)->get();
        }else{
            $entries = Achievement::where('user_id', Auth::user()->id)->get();
        }
        return view('dash.achieve',['entries' => $entries , 'search' => $search]);
    }

    public function achieveadd(){
        return view('dash.achieveadd');
    } 

    public function dachieveadd(Request $request){
        $data = $request->validate([
            'name'=>'required|string',
            'roll'=>'required|string',
            'dept'=>'required|string',
            'year'=>'required|string',
            'activity'=>'required|string',
            'award'=>'nullable|string',
            'certificate'=>'nullable|mimes:png,pdf,jpg,jpeg,webp'
        ]);

        if ($request->has('certificate')) {
            $file = $request->file('certificate');
            $extension = $file->getClientOriginalExtension();

            $filename = time(). '.' .$extension;
            $path = 'uploads/achievements/';
            $file->move($path, $filename);


        }

        Achievement::create([
            'name'=>$data['name'],
            'roll'=> $data['roll'],
            'dept'=> $data['dept'],
            'year'=> $data['year'],
            'activity'=> $data['activity'],
            'award'=> $data['award'],
            'certificate'=> $path . $filename,
            'user_id' => Auth::id(),  // Automatically set user_id from the logged-in user


        ]);

        return redirect(route('dash.achieve'));
    }

    public function achieveedit(Achievement $newentries)
    {
        return view('dash.achieveedit', ['newentries' => $newentries]);
    }
    

    public function achieveupdate(Request $request, Achievement $newentries)
    {
        // Validate the form data
        $data = $request->validate([
            'name' => 'required|string',
            'roll' => 'required|string',
            'dept' => 'required|string',
            'year' => 'required|string',
            'activity' => 'required|string',
            'award' => 'nullable|string',
            'certificate' => 'nullable|mimes:png,pdf,jpg,jpeg,webp' // Add file validation for certificate
        ]);
    
        // Handle the certificate upload if a new certificate is provided
        if ($request->has('certificate')) {
            // Delete the old certificate if it exists (optional, if you want to replace it)
            if ($newentries->certificate && file_exists(public_path($newentries->certificate))) {
                unlink(public_path($newentries->certificate));
            }
    
            // Upload new certificate
            $file = $request->file('certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/achievements/';
            $file->move(public_path($path), $filename);
    
            // Update the data with the new certificate path
            $data['certificate'] = $path . $filename;
        } else {
            // If no new certificate is uploaded, retain the old one
            $data['certificate'] = $newentries->certificate;
        }
    
        // Update the achievement entry in the database
        $newentries->update($data);
    
        // Redirect to the achievements page
        return redirect(route('dash.achieve'));
    }
    public function adestroy(Achievement $newentries){
        $newentries -> delete();
        
        return redirect(route('dash.achieve'));    
    }

    public function achieveview(Achievement $newentries){
    
        return view('dash.achieveview', ['newentries' => $newentries]);
    }
    

//======================================================================================================================================================================


    public function internship(Request $request){

        $search = $request->input('search', '');
        if($search != ''){
            $entries = Intership::where('organization', 'like', "%$search%")->where('user_id',Auth::user()->id)->get(); //inplace of like we can use = [but the column name in search must be same no half name]
        }else{
            $entries = Intership::where('user_id', Auth::user()->id)->get();
        }

        // $entries = Intership::where('user_id',Auth::user())->get();
        return view('dash.internship',['entries' => $entries , 'search' => $search]);
    } 

    public function internshipadd(){
        return view('dash.internshipadd');
    }

    public function dinternshipadd(Request $request){
        $data = $request->validate([
            'name'=>'required|string',
            'roll'=>'required|string',
            'dept'=>'required|string',
            'year'=>'required|string',
            'organization'=>'required|string',
            'start'=>'required|string',
            'end'=>'required|string',
            'certificate'=>'nullable|mimes:png,pdf,jpg,jpeg,webp'
        ]);

        if ($request->has('certificate')) {
            $file = $request->file('certificate');
            $extension = $file->getClientOriginalExtension();

            $filename = time(). '.' .$extension;
            $path = 'uploads/internship/';
            $file->move($path, $filename);


        }
        Intership::create([
            'name'=>$data['name'],
            'roll'=> $data['roll'],
            'dept'=> $data['dept'],
            'year'=> $data['year'],
            'organization'=> $data['organization'],
            'start'=> $data['start'],
            'end'=> $data['end'],
            'certificate'=> $path . $filename,
            'user_id' => Auth::id(),  // Automatically set user_id from the logged-in user


        ]);

        return redirect(route('dash.internship'));
    }

    public function internshipedit(Intership $newentries){
        return view('dash.internshipedit',['newentries' => $newentries]);
    }

    public function internshipupdate(Request $request , Intership $newentries){
        $data = $request->validate([
            'name'=>'required|string',
            'roll'=>'required|string',
            'dept'=>'required|string',
            'year'=>'required|string',
            'organization'=>'required|string',
            'start'=>'required|string',
            'end'=>'required|string',
            'certificate'=>'nullable|mimes:png,pdf,jpg,jpeg,webp'
        ]);
    

    if ($request->has('certificate')) {
        // Delete the old certificate if it exists (optional, if you want to replace it)
        if ($newentries->certificate && file_exists(public_path($newentries->certificate))) {
            unlink(public_path($newentries->certificate));
        }

        // Upload new certificate
        $file = $request->file('certificate');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/internship/';
        $file->move(public_path($path), $filename);

        // Update the data with the new certificate path
        $data['certificate'] = $path . $filename;
    } else {
        // If no new certificate is uploaded, retain the old one
        $data['certificate'] = $newentries->certificate;
    }

    // Update the achievement entry in the database
    $newentries->update($data);

    // Redirect to the achievements page
    return redirect(route('dash.internship'));
    
    }
    public function idestroy(Intership $newentries){
        $newentries -> delete();
        
        return redirect(route('dash.internship'));    
    }

    public function internshipview(Intership $newentries){
    
        return view('dash.internshipview', ['newentries' => $newentries]);
    }

//======================================================================================================================================================================


    public function courses(Request $request){
        $search = $request->input('search','');
        if($search != ''){
            $entries = Courses::where('type', 'like' , "%$search%")->where('user_id', Auth::user()->id)->get();
        }else{
            $entries = Courses::where('user_id', Auth::user()->id)->get();
        }

        return view('dash.courses',['entries' => $entries , 'search' => $search]);
    } 

    public function coursesadd(){
        return view('dash.coursesadd');
    }

    public function dcoursesadd(Request $request){
        $data = $request->validate([
            'name'=>'required|string',
            'roll'=>'required|string',
            'dept'=>'required|string',
            'year'=>'required|string',
            'type'=>'required|string',
            'title'=>'required|string',
            'organization'=>'required|string',
            'start'=>'required|string',
            'end'=>'required|string',
            'certificate'=>'nullable|mimes:png,pdf,jpg,jpeg,webp'
        ]);

        if ($request->has('certificate')) {
            $file = $request->file('certificate');
            $extension = $file->getClientOriginalExtension();

            $filename = time(). '.' .$extension;
            $path = 'uploads/courses/';
            $file->move($path, $filename);
        }

        $entries = Courses::create([
            'name'=>$data['name'],
            'roll'=>$data['roll'],
            'dept'=>$data['dept'],
            'year'=>$data['year'],
            'type'=>$data['type'],
            'title'=>$data['title'],
            'organization'=>$data['organization'],
            'start'=> $data['start'],
            'end'=> $data['end'],
            'certificate'=> $path . $filename,
            'user_id' => Auth::id(),  // Automatically set user_id from the logged-in user

        ]);

        return redirect(route('dash.courses'));
    }

    public function coursesedit(Courses $newentries){
        return view('dash.coursesedit', ['newentries' => $newentries]);
    }

    public function coursesupdate(Request $request , Courses $newentries){
        $data = $request->validate([
            'name'=>'required|string',
            'roll'=>'required|string',
            'dept'=>'required|string',
            'year'=>'required|string',
            'type'=>'required|string',
            'title'=>'required|string',
            'organization'=>'required|string',
            'start'=>'required|string',
            'end'=>'required|string',
            'certificate'=>'nullable|mimes:png,pdf,jpg,jpeg,webp'
        ]);

        if ($request->has('certificate')) {
            // Delete the old certificate if it exists (optional, if you want to replace it)
            if ($newentries->certificate && file_exists(public_path($newentries->certificate))) {
                unlink(public_path($newentries->certificate));
            }
    
            // Upload new certificate
            $file = $request->file('certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/courses/';
            $file->move(public_path($path), $filename);
    
            // Update the data with the new certificate path
            $data['certificate'] = $path . $filename;
        } else {
            // If no new certificate is uploaded, retain the old one
            $data['certificate'] = $newentries->certificate;
        }
    
        // Update the achievement entry in the database
        $newentries->update($data);
    
        // Redirect to the achievements page
        return redirect(route('dash.courses'));
    }
    public function cdestroy(Courses $newentries){
        $newentries -> delete();
        
        return redirect(route('dash.courses'));    
    }
    
    public function coursesview(Courses $newentries){
    
        return view('dash.coursesview', ['newentries' => $newentries]);
    }



//======================================================================================================================================================================


    public function paper(Request $request){
        $search = $request->input('search', '');
        if($search != ''){
            $entries = Paper::where('title', 'like' , "%$search%")->where('user_id', Auth::user()->id)->get();
        }else{
            $entries = Paper::where('user_id', Auth::user()->id)->get();
        }
        return view('dash.paper',['entries' => $entries, 'search' => $search]);
    } 

    public function paperadd(){
        return view('dash.paperadd');
    }

    public function dpaperadd(Request $request){
        $data = $request->validate([
            'name'=>'required|string',
            'roll'=>'required|string',
            'dept'=>'required|string',
            'year'=>'required|string',
            'title'=>'required|string',
            'year_p'=>'required|string',
            'publisher'=>'required|string',
            'paper'=>'nullable|mimes:png,pdf,jpg,jpeg,webp'
        ]);

        if ($request->has('paper')) {
            $file = $request->file('paper');
            $extension = $file->getClientOriginalExtension();

            $filename = time(). '.' .$extension;
            $path = 'uploads/paper/';
            $file->move($path, $filename);

        }

        $entries = Paper::create([
            'name'=>$data['name'],
            'roll'=>$data['roll'],
            'dept'=>$data['dept'],
            'year'=>$data['year'],
            'title'=>$data['title'],
            'year_p'=>$data['year_p'],
            'publisher'=> $data['publisher'],
            'paper'=> $path . $filename,
            'user_id' => Auth::id(),  // Automatically set user_id from the logged-in user
        ]);

        return redirect(route('dash.paper'));
    }
    
    public function paperedit(Paper $newentries){
        return view('dash.paperedit', ['newentries' => $newentries]);
    }

    public function paperupdate(Request $request , Paper $newentries){
        $data = $request->validate([
            'name'=>'required|string',
            'roll'=>'required|string',
            'dept'=>'required|string',
            'year'=>'required|string',
            'title'=>'required|string',
            'year_p'=>'required|string',
            'publisher'=>'required|string',
            'paper'=>'nullable|mimes:png,pdf,jpg,jpeg,webp'
        ]);

        if ($request->has('paper')) {
            // Delete the old certificate if it exists (optional, if you want to replace it)
            if ($newentries->paper && file_exists(public_path($newentries->paper))) {
                unlink(public_path($newentries->paper));
            }
    
            // Upload new certificate
            $file = $request->file('paper');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/paper/';
            $file->move(public_path($path), $filename);
    
            // Update the data with the new certificate path
            $data['paper'] = $path . $filename;
        } else {
            // If no new certificate is uploaded, retain the old one
            $data['paper'] = $newentries->paper;
        }
    
        // Update the achievement entry in the database
        $newentries->update($data);
    
        // Redirect to the achievements page
        return redirect(route('dash.paper'));

    }

    public function pdestroy(Paper $newentries){
        $newentries -> delete();
        
        return redirect(route('dash.paper'));    
    }

    public function paperview(Paper $newentries){
    
        return view('dash.paperview', ['newentries' => $newentries]);
    }

//======================================================================================================================================================================

    
}


//======================================================================================================================================================================
