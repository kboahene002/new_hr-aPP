<?php

use App\Models\setup\Promotion;
use App\Models\setup\SalaryGrade;
use App\Models\setup\DepartmentList;
use Illuminate\Support\Facades\Route;
use App\Models\setup\QualificationType;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\setup\LeaveTypeController;
use App\Http\Controllers\setup\PromotionController;
use App\Http\Controllers\setup\SalaryGradeController;
use App\Http\Controllers\setup\SalaryNotchController;
use App\Http\Controllers\setup\StaffStatusController;
use App\Http\Controllers\setup\MaritaStatusController;
use App\Http\Controllers\setup\AppraisalTypeController;
use App\Http\Controllers\setup\DependantTypeController;
use App\Http\Controllers\setup\jobCategoriesController;
use App\Http\Controllers\setup\DepartmentListController;
use App\Http\Controllers\setup\AppointmentTypeController;
use App\Http\Controllers\setup\DisciplinaryTypeController;
use App\Http\Controllers\setup\JobListController;
use App\Http\Controllers\setup\SalaryGradeNotchController;
use App\Http\Controllers\setup\QualificationTypeController;
use App\Http\Controllers\setup\RankController;

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



Route::group(['middleware'=>'auth'] , function(){

    Route::get('dashboard', function () {
        return view('layout.template');
    })->name('dashboard');
    //----------Logout --------------- //

Route::post('logout', [AuthController::class , "logout"] );


    //----------Department List --------------- //
Route::get('hr/departmentList' , [DepartmentListController::class , 'index'] )->name('departmentList');
Route::post('hr/departmentList' , [DepartmentListController::class , 'store']);
Route::get( "hr/search/departmentList" , [DepartmentListController::class , 'search']);
Route::post('hr/departmentList/delete/{id}' , [DepartmentListController::class , 'delete']);
Route::get('hr/departmentList/edit/{id}' , [DepartmentListController::class , 'edit']);
Route::post('hr/departmentList/update/{id}', [DepartmentListController::class , 'update']);


    //----------Job Category List --------------- //
Route::get('hr/jobCategory' , [jobCategoriesController::class , 'index']);
Route::post('hr/jobCategory' , [jobCategoriesController::class , 'store']);
Route::get( "hr/search/jobCategory" , [DepartmentListController::class , 'search']);
Route::post('hr/jobCategory/delete/{id}' , [DepartmentListController::class , 'delete']);
Route::get('hr/jobCategory/edit/{id}' , [DepartmentListController::class , 'edit']);
Route::post('hr/jobCategory/update/{id}', [DepartmentListController::class , 'update']);


    //----------marital status --------------- //
Route::get('hr/maritalStatus' , [MaritaStatusController::class , 'index'] );
Route::get( "hr/search/maritalStatus" , [MaritaStatusController::class , 'search']);
Route::post('hr/maritalStatus' , [MaritaStatusController::class , 'store']);
Route::post('hr/maritalStatus/delete/{id}' , [MaritaStatusController::class , 'delete']);
Route::get('hr/maritalStatus/edit/{id}' , [MaritaStatusController::class , 'edit']);
Route::post('hr/maritalStatus/update/{id}', [MaritaStatusController::class , 'update']);

    //----------staff status --------------- //
Route::get('hr/staffStatus' , [StaffStatusController::class , 'index'] );
Route::get( "hr/search/staffStatus" , [StaffStatusController::class , 'search']);
Route::post('hr/staffStatus' , [StaffStatusController::class , 'store']);
Route::post('hr/staffStatus/delete/{id}' , [StaffStatusController::class , 'delete']);
Route::get('hr/staffStatus/edit/{id}' , [StaffStatusController::class , 'edit']);
Route::post('hr/staffStatus/update/{id}', [StaffStatusController::class , 'update']);


    //----------Dependant Types --------------- //
Route::get('hr/dependantType' , [DependantTypeController::class , 'index'] );
Route::get( "hr/search/dependantType" , [DependantTypeController::class , 'search']);
Route::post('hr/dependantType' , [DependantTypeController::class , 'store']);
Route::post('hr/dependantType/delete/{id}' , [DependantTypeController::class , 'delete']);
Route::get('hr/dependantType/edit/{id}' , [DependantTypeController::class , 'edit']);
Route::post('hr/dependantType/update/{id}', [DependantTypeController::class , 'update']);

        //----------Qualification Types --------------- //
Route::get('hr/qualificationType' , [QualificationTypeController::class , 'index'] );
Route::get( "hr/search/qualificationType" , [QualificationTypeController::class , 'search']);
Route::post('hr/qualificationType' , [QualificationTypeController::class , 'store']);
Route::post('hr/qualificationType/delete/{id}' , [QualificationTypeController::class , 'delete']);
Route::get('hr/qualificationType/edit/{id}' , [QualificationTypeController::class , 'edit']);
Route::post('hr/qualificationType/update/{id}', [QualificationTypeController::class , 'update']);



        //----------promotion Types --------------- //
Route::get('hr/promotion' , [PromotionController::class , 'index'] );
Route::get( "hr/search/promotion" , [PromotionController::class , 'search']);
Route::post('hr/promotion' , [PromotionController::class , 'store']);
Route::post('hr/promotion/delete/{id}' , [PromotionController::class , 'delete']);
Route::get('hr/promotion/edit/{id}' , [PromotionController::class , 'edit']);
Route::post('hr/promotion/update/{id}', [PromotionController::class , 'update']);



        //----------promotion Types --------------- //
Route::get('hr/appointmentType' , [AppointmentTypeController::class , 'index'] );
Route::get( "hr/search/appointmentType" , [AppointmentTypeController::class , 'search']);
Route::post('hr/appointmentType' , [AppointmentTypeController::class , 'store']);
Route::post('hr/appointmentType/delete/{id}' , [AppointmentTypeController::class , 'delete']);
Route::get('hr/appointmentType/edit/{id}' , [AppointmentTypeController::class , 'edit']);
Route::post('hr/appointmentType/update/{id}', [AppointmentTypeController::class , 'update']);

        //----------appraisal Types --------------- //
Route::get('hr/appraisalType' , [AppraisalTypeController::class , 'index'] );
Route::get( "hr/search/appraisalType" , [AppraisalTypeController::class , 'search']);
Route::post('hr/appraisalType' , [AppraisalTypeController::class , 'store']);
Route::post('hr/appraisalType/delete/{id}' , [AppraisalTypeController::class , 'delete']);
Route::get('hr/appraisalType/edit/{id}' , [AppraisalTypeController::class , 'edit']);
Route::post('hr/appraisalType/update/{id}', [AppraisalTypeController::class , 'update']);

        //----------Leave Types --------------- //
Route::get('hr/leaveType' , [LeaveTypeController::class , 'index'] );
Route::get( "hr/search/leaveType" , [LeaveTypeController::class , 'search']);
Route::post('hr/leaveType' , [LeaveTypeController::class , 'store']);
Route::post('hr/leaveType/delete/{id}' , [LeaveTypeController::class , 'delete']);
Route::get('hr/leaveType/edit/{id}' , [LeaveTypeController::class , 'edit']);
Route::post('hr/leaveType/update/{id}', [LeaveTypeController::class , 'update']);

        //----------Leave Types --------------- //
Route::get('hr/disciplinaryType' , [DisciplinaryTypeController::class , 'index'] );
Route::get( "hr/search/disciplinaryType" , [DisciplinaryTypeController::class , 'search']);
Route::post('hr/disciplinaryType' , [DisciplinaryTypeController::class , 'store']);
Route::post('hr/disciplinaryType/delete/{id}' , [DisciplinaryTypeController::class , 'delete']);
Route::get('hr/disciplinaryType/edit/{id}' , [DisciplinaryTypeController::class , 'edit']);
Route::post('hr/disciplinaryType/update/{id}', [DisciplinaryTypeController::class , 'update']);


        //----------Salary Grade and Notch  --------------- //
Route::get('hr/salaryGradeNotch' , [SalaryGradeNotchController::class , 'index'] );
Route::get( "hr/search/salaryGradeNotch" , [SalaryGradeNotchController::class , 'search']);
Route::post('hr/salaryGradeNotch' , [SalaryGradeNotchController::class , 'store']);
Route::post('hr/salaryGradeNotch/delete/{id}' , [SalaryGradeNotchController::class , 'delete']);
Route::get('hr/salaryGradeNotch/edit/{id}' , [SalaryGradeNotchController::class , 'edit']);
Route::post('hr/salaryGradeNotch/update/{id}', [SalaryGradeNotchController::class , 'update']);



        //----------Salary Grade   --------------- //

Route::get('hr/salaryGrade/{id}' , [SalaryGradeController::class , 'index'] );
Route::post('hr/salaryGrade/{id}' , [SalaryGradeController::class , 'store']);
Route::post('hr/{reference}/salaryGrade/delete/{id}' , [SalaryGradeController::class , 'delete']);
Route::get('hr/{reference}/salaryGrade/edit/{id}' , [SalaryGradeController::class , 'edit']);
Route::post('hr/{referene}/salaryGrade/update/{id}', [SalaryGradeController::class , 'update']);



        //----------Salary Notch   --------------- //

Route::get('hr/salaryNotch/{id}' , [SalaryNotchController::class , 'index']);
Route::post('hr/salaryNotch/{id}' , [SalaryNotchController::class , 'store']);
Route::get('hr/{reference}/salaryNotch/edit/{id}' , [SalaryNotchController::class , 'edit']);

Route::post('hr/{reference}/salaryNotch/delete/{id}' , [SalaryNotchController::class , 'delete']);
Route::post('hr/{referene}/salaryNotch/update/{id}', [SalaryNotchController::class , 'update']);



        //----------Job List   --------------- //

Route::get('hr/jobList' , [JobListController::class , 'index'] );
Route::post('hr/jobList' , [JobListController::class , 'store']);
Route::post('hr/jobList/delete/{id}' , [JobListController::class , 'delete']);
Route::get('hr/jobList/edit/{id}' , [JobListController::class , 'edit']);
Route::post('hr/jobList/update/{id}', [JobListController::class , 'update']);



//----------rank List   --------------- //

Route::get('hr/ranks' , [RankController::class , 'index'] );
Route::post('hr/ranks' , [RankController::class , 'store']);
Route::post('hr/ranks/delete/{id}' , [RankController::class , 'delete']);
Route::get('hr/ranks/edit/{id}' , [RankController::class , 'edit']);
Route::post('hr/ranks/update/{id}', [RankController::class , 'update']);


 //----------Employee   --------------- //
 Route::get('hr/employee' , [EmployeeController::class , 'index']);
 Route::POST('new', [EmployeeController::class , 'storeEmployee']);
 Route::post('department' , [EmployeeController::class , 'getAllDepartment']);
 Route::post('jobList' , [EmployeeController::class , 'getAllJobTitle']);
 Route::post('filter' , [EmployeeController::class , 'getJobCategory']);
 Route::get('hr/view-employee' , [EmployeeController::class , 'viewEmployer']);

});










//Authentication
Route::get('/' , [AuthController::class , 'index'])->name('login')->middleware('guest');