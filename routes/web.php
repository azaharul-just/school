<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin Controller
Route::get('/admin/logout',[AdminController::class, 'Logout'])->name('admin.logout');


// Manage User- User Controller

Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class, 'UserView'])->name('user.view');
    Route::get('/add',[UserController::class, 'UserAdd'])->name('users.add');
    Route::post('/store',[UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
});

// Manage Profile- ProfileController

Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store/{id}',[ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view',[ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update/',[ProfileController::class, 'PasswordUpdate'])->name('profile.password.update');
     
});

// Setup Management 

Route::prefix('setups')->group(function(){

    //Student Class Routes
    Route::get('student/class/view',[StudentClassController::class, 'ViewStudent'])->name('student.class.view'); 
    Route::get('student/class/add',[StudentClassController::class, 'StudentClassAdd'])->name('student.class.add'); 
    Route::post('student/class/store',[StudentClassController::class, 'StudentClassStore'])->name('student.class.store');
    Route::get('student/class/edit/{id}',[StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit'); 
    Route::post('student/class/update/{id}',[StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update'); 
    Route::get('student/class/delete/{id}',[StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete'); 

    //Student Year Routes
    Route::get('student/year/view',[StudentYearController::class, 'ViewYear'])->name('student.year.view'); 
    Route::get('student/year/add',[StudentYearController::class, 'StudentYearAdd'])->name('student.year.add'); 
    Route::post('student/year/store',[StudentYearController::class, 'StudentYearStore'])->name('student.year.store');

    Route::get('student/year/edit/{id}',[StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit'); 
    Route::post('student/year/update/{id}',[StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update'); 
    Route::get('student/year/delete/{id}',[StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete'); 

    //Student Group Routes
    Route::get('student/group/view',[StudentGroupController::class, 'ViewGroup'])->name('student.group.view'); 
    Route::get('student/group/add',[StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add'); 
    Route::post('student/group/store',[StudentGroupController::class, 'StudentGroupStore'])->name('student.group.store');

    Route::get('student/group/edit/{id}',[StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit'); 
    Route::post('student/group/update/{id}',[StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update'); 
    Route::get('student/group/delete/{id}',[StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete'); 


});




