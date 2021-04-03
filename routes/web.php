<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\StudentSubjectController; 
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;

use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;

use App\Http\Controllers\Backend\Employee\EmployeeRegController;

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


//Checking login or not using auth middleware
Route::group(['middleware'=>'auth'], function(){ 

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

        //Student Shift Routes
        Route::get('student/shift/view',[StudentShiftController::class, 'ViewShift'])->name('student.shift.view'); 
        Route::get('student/shift/add',[StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add'); 
        Route::post('student/shift/store',[StudentShiftController::class, 'StudentShiftStore'])->name('student.shift.store');

        Route::get('student/shift/edit/{id}',[StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit'); 
        Route::post('student/shift/update/{id}',[StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update'); 
        Route::get('student/shift/delete/{id}',[StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete'); 


        //Student Fee Category Routes
        Route::get('fee/category/view',[FeeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view'); 
        Route::get('fee/category/add',[FeeCategoryController::class, 'Fee_Cat_Add'])->name('fee.category.add');
        Route::post('fee/category/store',[FeeCategoryController::class, 'Fee_Cat_Store'])->name('fee.category.store');
        Route::get('fee/category/edit/{id}',[FeeCategoryController::class, 'Fee_Cat_Edit'])->name('fee.category.edit'); 
        Route::post('fee/category/update/{id}',[FeeCategoryController::class, 'Fee_Cat_Update'])->name('fee.category.update'); 
        Route::get('fee/category/delete/{id}',[FeeCategoryController::class, 'Fee_Cat_Delete'])->name('fee.category.delete'); 

        //Student Fee Category Amounts Routes
        Route::get('fee/amount/view',[FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');  
        Route::get('fee/amount/add',[FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add'); 
        Route::post('fee/amount/store',[FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount'); 
        Route::get('fee/amount/edit/{fee_category_id}',[FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
        Route::post('fee/amount/update/{fee_category_id}',[FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount'); 
        Route::get('fee/amount/details/{fee_category_id}',[FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');

        //Student Exam Types Routes
        Route::get('exam/type/view',[ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');  
        Route::get('exam/type/add',[ExamTypeController::class, 'AddExamType'])->name('exam.type.add'); 
        Route::post('exam/type/store',[ExamTypeController::class, 'StoreExamType'])->name('exam.type.store'); 
        Route::get('exam/type/edit/{exam}',[ExamTypeController::class, 'EditExamType'])->name('exam.type.edit');
        Route::post('exam/type/update/{exam}',[ExamTypeController::class, 'UpdateExamType'])->name('exam.type.update'); 
        Route::get('exam/type/details/{exam}',[ExamTypeController::class, 'DeleteExamType'])->name('exam.type.delete');

        //Student Subject Routes
        Route::get('student/subject/view',[StudentSubjectController::class, 'ViewStudentSubject'])->name('student.subject.view');  
        Route::get('student/subject/add',[StudentSubjectController::class, 'AddStudentSubject'])->name('student.subject.add'); 
        Route::post('student/subject/store',[StudentSubjectController::class, 'StoreStudentSubject'])->name('student.subject.store'); 
        Route::get('student/subject/add/{subject}',[StudentSubjectController::class, 'EditStudentSubject'])->name('student.subject.edit');
        Route::post('student/subject/update{subject}',[StudentSubjectController::class, 'UpdateStudentSubject'])->name('student.subject.update'); 
        Route::get('student/subject/delete{subject}',[StudentSubjectController::class, 'DeleteStudentSubject'])->name('student.subject.delete');


        //Student Assign Subject Routes
        Route::get('assign/subject/view',[AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');  
        Route::get('assign/subject/add',[AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add'); 
        Route::post('store/assign/subject',[AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject'); 
        Route::get('assign/subject/edit/{assign}',[AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
        Route::post('update/assign/subject/{assign}',[AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject'); 
        Route::get('assign/subject/details/{assign}',[AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');

        //Designation Routes
        Route::get('designation/view',[DesignationController::class, 'ViewDesignation'])->name('designation.view'); 
        Route::get('designation/add',[DesignationController::class, 'DesignationAdd'])->name('designation.add'); 
        Route::post('designation/store',[DesignationController::class, 'DesignationStore'])->name('designation.store');
        Route::get('designation/edit/{id}',[DesignationController::class, 'DesignationEdit'])->name('designation.edit'); 
        Route::post('designation/update/{id}',[DesignationController::class, 'DesignationUpdate'])->name('designation.update'); 
        Route::get('designation/delete/{id}',[DesignationController::class, 'DesignationDelete'])->name('designation.delete'); 

        
    });


    // Student Management - Routes 
    Route::prefix('students')->group(function(){
        Route::get('/reg/view',[StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
        Route::get('/reg/add',[StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
        Route::post('/reg/Store',[StudentRegController::class, 'StudentRegStore'])->name('student.registration.store');
        Route::get('/year/class/wise',[StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
        Route::get('/reg/edit/{student_id}',[StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
        Route::post('/reg/update/{student_id}',[StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
        Route::get('/reg/promotion/{student_id}',[StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
        Route::post('/reg/update/promotion/{student_id}',[StudentRegController::class, 'StudentRegUpdatePromotion'])->name('update.promotion.student.registration');
        Route::get('/reg/details/{student_id}',[StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

        //Student Roll Generate Routes  
        Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');

        Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');

        Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');

        // Registration Fee Routes 
        Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');

        Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');

        Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');

        // Monthly Fee Routes 
        Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');

            
        Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');

        Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');


        // Exam Fee Routes 
        Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');

        Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');

        Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');

    

    });

    //Employee Management Routes  
    Route::prefix('employees')->group(function(){
        Route::get('reg/employee/view',[EmployeeRegController::class, 'EmployeeView'])->name('employee.registration.view');
        

        Route::get('reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');

        Route::post('reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');
        
        Route::get('reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.registration.edit');

        Route::post('reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');

        Route::get('reg/employee/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.registration.details');










    });





});

