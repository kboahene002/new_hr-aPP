<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Models\setup\JobList;
use Illuminate\Http\Response;
use App\Models\Employee\Employee;
use App\Models\setup\JobCategories;
use App\Http\Controllers\Controller;
use App\Models\setup\DepartmentList;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;


class EmployeeController extends Controller
{
    public function index(){
        return view('employee.addEmployee');
    }

    public function storeEmployee(Request $request){

         $request->file('avatar');
        // $filename = $request->ssn_number . '.' . $request->file('avatar')->getClientOriginalExtension();


        $validation = Validator::make($request->all() , [
            'surname' => "required|string",
            'other_names' => "required|string",
            'staff_id' => "required",
            'ssn_number' => "required",
            'gender' => "required",
            'country' => "required",
            'd_o_b' => "required",
            'marital_status_id' => "required",
            'work_station_id' => "required",
            'staff_status_id' => "required",
            'division' => "required",
            'department_id' => "required",
            'job_title_id' => "required",
            'job_category_id' => "required",
            'first_app_date' => "required",
            'qualification_id' => "required",
            'starting_salary_id' => "required",
            'monthly_salary' => "required|string",
            'postal_address' => "required|string",
            'city' => "required|string",
            'city_region' => "required|string",
            'home_town' => "required|string",
            'phone_number' => "required|digits:10",
            'email' => "required|email",
            'home_town_region' => "required",
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);




        if($validation->fails()){
            return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validation->errors());
        }

        //return 1234;

        $uploadedFile = $request->file('avatar');



        // Generate a unique filename
        $filename = $request->ssn_number . '.' . $uploadedFile->getClientOriginalExtension();
        //return $filename;


        // Check if the file already exists in storage
        if (Storage::exists('Employee-images' . $filename)) {
            return 'Image already exists!';
        }else{
            $imagePath = $uploadedFile->storeAs('Employee-images', $filename);
            //return $imagePath;
        }



         $create = Employee::create([
            'surname' => $request->surname,
            'other_names' => $request->other_names,
            'staff_id' => $request->staff_id,
            'ssn_number' => $request->ssn_number,
            'gender' => $request->gender,
            'country' => $request->country,
            'd_o_b' => $request->d_o_b,
            'marital_status_id' => $request->marital_status_id,
            'work_station' => $request->work_station_id,
            'staff_status_id' => $request->staff_status_id,
            'division' => $request->division,
            'department_id' => $request->department_id,
            'job_title_id' =>$request->job_title_id,
            'job_category_id' => $request->job_category_id,
            'first_app_date' => $request->first_app_date,
            'qualification_id' => $request->qualification_id,
            'starting_salary_id' => $request->starting_salary_id,
            'monthly_salary' => $request->monthly_salary,
            'postal_address' => $request->postal_address,
            'city' => $request->city,
            'city_region' => $request->city_region,
            'home_towm' => $request->home_town,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'home_town_region' => $request->home_town_region,
            'residential_address'=>$request->residential_address,
            'home_towm'=>$request->home_town,
            // 'avatar'=> $filename
         ]);
    }

    public function getAllDepartment(Request $request){

        $department = DepartmentList::where('divisionName' , $request->name)->get();
        return $department;
    }

    public function getAllJobTitle(Request $request){

        $department = DepartmentList::where('id' , $request->name)->first();

        $job_list = JobList::where('department_id' , $department->id)->get();
        return  $job_list;
    }

    public function getJobCategory(Request $request){


        $job_list = JobList::with('notch')->where('id' , $request->name)->first();
        $job_category = JobCategories::where('id' , $job_list->job_category_id)->first();

        return response()->json([
            'job_list' => $job_list ,
            'job_category' => $job_category,
            'notch' => $job_list->notch
        ]);


        $starting_salary = $job_list->starting_salary;

        $job_category = JobCategories::where('job_category_name' , $job_list)->first();


        $string = $starting_salary;


    }
}
