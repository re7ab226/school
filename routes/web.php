<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\classsubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgotpassword', [AuthController::class, 'ForgotPassword']);
Route::post('forgotpassword', [AuthController::class, 'ResetForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'ResetPassword']);
Route::get('reset/{token}', [AuthController::class, 'postResetPassword']);






Route::get('/admin/admin/list', function () {
    return view('admin.admin.list');
});

//Admin middelware group

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
    //Admin Crud
    Route::get('/admin/admin/list',[AdminController::class, 'list']);
    Route::get('/admin/admin/add',[AdminController::class, 'add']);
    Route::post('/admin/admin/add',[AdminController::class, 'insert']);
    Route::get('/admin/admin/edit/{id}',[AdminController::class, 'edit']);
    Route::post('/admin/admin/edit/{id}',[AdminController::class, 'update']);
    Route::get('/admin/admin/delete/{id}',[AdminController::class, 'delete']);

//Class URL
Route::get('/admin/class/list', [ClassController::class, 'list']);
Route::get('/admin/class/add', [ClassController::class, 'add']);
Route::post('/admin/class/add', [ClassController::class, 'insert']);
Route::get('/admin/class/edit/{id}', [ClassController::class, 'edit']);
Route::post('/admin/class/edit/{id}', [ClassController::class, 'update']);
Route::get('/admin/class/delete/{id}', [ClassController::class, 'delete']);

//Subjects URL
Route::get('/admin/subjects/list', [SubjectController::class, 'list']);
Route::get('/admin/subjects/add', [SubjectController::class, 'add']);
Route::post('/admin/subjects/add', [SubjectController::class, 'insert']);
Route::get('/admin/subjects/edit/{id}', [SubjectController::class, 'edit']);
Route::post('/admin/subjects/edit/{id}', [SubjectController::class, 'update']);
Route::get('/admin/subjects/delete/{id}', [SubjectController::class, 'delete']);

//Assign  URL
Route::get('/admin/classsubject/list', [classsubjectController::class, 'list']);
Route::get('/admin/classsubject/add', [classsubjectController::class, 'add']);
Route::post('/admin/classsubject/add', [classsubjectController::class, 'insert']);
Route::get('/admin/classsubject/edit/{id}', [classsubjectController::class, 'edit']);
Route::post('/admin/classsubject/edit/{id}', [classsubjectController::class, 'update']);
Route::get('/admin/classsubject/delete/{id}', [classsubjectController::class, 'delete']);







});
//student middelware group

Route::group(['Middleware' => 'student'], function () {
    Route::get('/student/dashboard', [DashboardController::class, 'dashboard']);
});
//teacher middelware group

Route::group(['Middleware' => 'teacher'], function () {
    Route::get('/teacher/dashboard', [DashboardController::class, 'dashboard']);
});

//Parent Middleware group

Route::group(['Middleware' => 'parent'], function () {
    Route::get('/parent/dashboard', [DashboardController::class, 'dashboard']);
});
