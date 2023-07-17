<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\setup\DepartmentList;
use App\Models\setup\JobCategories;
use App\Models\setup\JobList;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.addEmployee');
    }

    public function storeEmployee(Request $request){
        
        // $validation = Validation::make
        return $request->file('avatar')->getClientOriginalName();
    }
    public function getAllDepartment(Request $request){
        
        $department = DepartmentList::where('divisionName' , $request->name)->get();
        return $department;
    }

    public function getAllJobTitle(Request $request){
        $department = DepartmentList::where('id' , $request->name)->first();
        $job_list = JobList::where('department' , $department->departmentName)->get();
        return $job_list;
    }

    public function getJobCategory(Request $request){
        
        $job_list = JobList::where('id' , $request->name)->first() ;
       
        $starting_salary = $job_list->starting_salary;
        
        $job_category = JobCategories::where('job_category_name' , $job_list)->first();


        $string = $starting_salary;
        $number = filter_var($string, FILTER_SANITIZE_NUMBER_INT);
        return $number ;
        return ['starting_salary' => $starting_salary , 'job_category'=>$job_category , 'monthly_salary' => $number];
    }
}
