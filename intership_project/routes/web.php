<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/register',[StudentController::class,'register'])->name('student.register');
Route::post('/student',[StudentController::class,'registersave'])->name('student.registersave');


Route::get('/student/login',[StudentController::class,'login'])->name('student.login');
Route::post('/student/loginsave',[StudentController::class,'loginsave'])->name('student.loginsave');


Route::get('/student/dashboard',[StudentController::class,'dashboard'])->name('student.dashboard');
Route::get('/student/dashboardsave',[StudentController::class,'dashboardsave'])->name('student.dashboardsave');


Route::get('/student/logout',[StudentController::class,'logout'])->name('student.logout');


Route::get('/dash/achieve',[StudentController::class,'dachieve'])->name('dash.achieve');
Route::get('/dash/achieveadd',[StudentController::class , 'achieveadd'])->name('dash.achieveadd');
Route::post('/dash/dachieveadd',[StudentController::class,'dachieveadd'])->name('dash.dachieveadd');
Route::get('/dash/{newentries}/achieveedit',[StudentController::class , 'achieveedit'])->name('dash.achieveedit');
Route::put('/dash/{newentries}/achieveupdate',[StudentController::class , 'achieveupdate'])->name('dash.achieveupdate');
Route::delete('/dash/{newentries}/adestroy',[StudentController::class , 'adestroy'])->name('dash.adestroy');
Route::get('/dash/{newentries}/achieveview',[StudentController::class , 'achieveview'])->name('dash.achieveview');



Route::get('/dash/internship',[StudentController::class , 'internship'])->name('dash.internship');
Route::get('/dash/internshipadd',[StudentController::class,'internshipadd'])->name('dash.internshipadd');
Route::post('/dash/dinternshipadd',[StudentController::class,'dinternshipadd'])->name('dash.dinternshipadd');
Route::get('/dash/{newentries}/internshipedit',[StudentController::class , 'internshipedit'])->name('dash.internshipedit');
Route::put('/dash/{newentries}/internshipupdate',[StudentController::class , 'internshipupdate'])->name('dash.internshipupdate');
Route::delete('/dash/{newentries}/idestroy',[StudentController::class , 'idestroy'])->name('dash.idestroy');
Route::get('/dash/{newentries}/internshipview',[StudentController::class , 'internshipview'])->name('dash.internshipview');




Route::get('/dash/courses',[StudentController::class , 'courses'])->name('dash.courses');
Route::get('/dash/coursesadd',[StudentController::class,'coursesadd'])->name('dash.coursesadd');
Route::post('/dash/dcoursesadd',[StudentController::class,'dcoursesadd'])->name('dash.dcoursesadd');
Route::get('/dash/{newentries}/coursesedit',[StudentController::class,'coursesedit'])->name('dash.coursesedit');
Route::put('/dash/{newentries}/coursesupdate',[StudentController::class,'coursesupdate'])->name('dash.coursesupdate');
Route::delete('/dash/{newentries}/cdestroy',[StudentController::class , 'cdestroy'])->name('dash.cdestroy');
Route::get('/dash/{newentries}/coursesview',[StudentController::class , 'coursesview'])->name('dash.coursesview');



Route::get('/dash/paper',[StudentController::class , 'paper'])->name('dash.paper');
Route::get('/dash/paperadd',[StudentController::class,'paperadd'])->name('dash.paperadd');
Route::post('/dash/dpaperadd',[StudentController::class,'dpaperadd'])->name('dash.dpaperadd');
Route::get('/dash/{newentries}/paperedit',[StudentController::class , 'paperedit'])->name('dash.paperedit');
Route::put('/dash/{newentries}/paperupdate',[StudentController::class , 'paperupdate'])->name('dash.paperupdate');
Route::delete('/dash/{newentries}/pdestroy',[StudentController::class , 'pdestroy'])->name('dash.pdestroy');
Route::get('/dash/{newentries}/paperview',[StudentController::class , 'paperview'])->name('dash.paperview');






