<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use App\Models\setup\JobList;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;
use App\Models\setup\DepartmentList;
use App\Models\setup\JobCategories;
use App\Models\setup\SalaryNotch;

class JobListController extends Controller
{
    public function __construct()
    {
        if(Auth::user()){
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $jobList = JobList::orderBy('created_at' , "ASC")->get();
        $department = DepartmentList::all();
        $jobCategory = JobCategories::all();
        $salaryNotch = SalaryNotch::all();
        return view('setup.jobList' , ['jobList'=> $jobList , "department" => $department , 'jobCategory'=> $jobCategory , "salaryNotch"=>$salaryNotch]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 

        // return $request->job_schedule;
        try{
            $validation = Validator::make(
                $request->all(),
                [
                    'job_title' => ['required', 'unique:job_lists' , 'string'],
                    'job_category' => ['required', 'string'],
                    'department' => ['required', 'string'],
                    'starting_salary' => ['required', 'string'],
                    'description'=>['max:225']
                ]
            );
            
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }
    
            // return 1234;
            //save data into database
            $insert = new JobList();
            $insert->job_title = $request->job_title;
            $insert->job_category = $request->job_category;
            $insert->department = $request->department;
            $insert->job_schedule = $request->job_schedule;
            $insert->starting_salary = $request->starting_salary;
            $insert->description = $request->description;
    
            $save = $insert->save();
            if ($save)
                return $this->index();
            }
        catch(Throwable $th){
                return (new ResponseController)->response(Response::HTTP_INTERNAL_SERVER_ERROR , 'error' , $th->getMessage());
        }
    }

    // public function search(Request $request){
    //     $jobList = JobList::where('marital_status_name' , "like" , "%".$request->keyword."%")->get();
    //     return view('setup.maritalStatus' , ['marital_status'=>$marital_status]);
    // }

    public function edit($id){
        $jobList = JobList::all();
        $find = JobList::find($id);
        $department = DepartmentList::all();
        $jobCategory = JobCategories::all();
        $salaryNotch = SalaryNotch::all();
        return view('setup.jobList' , ['jobList'=>$jobList,'department'=>$department , 'jobCategory'=>$jobCategory, 'salaryNotch'=>$salaryNotch , 'find'=>$find]);
    }
    
    public function update($id , Request $request){
       
        try{
            $validate = Validator::make($request->all() ,   [
                'job_title' => ['required', 'unique:job_lists,id' , 'string'],
                'job_category' => ['required', 'string'],
                'department' => ['required', 'string'],
                'starting_salary' => ['required', 'string'],
                'description'=>['max:225']
            ]);

            if($validate->fails()){
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validate->errors());
            }else{
                $update = jobList::where('id' , $id)->update([
                    'job_title'=>$request->job_title ,
                    'job_category'=>$request->job_category,
                    'department'=>$request->department,
                    'job_schedule'=>$request->job_schedule,
                    'starting_salary'=>$request->starting_salary,
                    'description' => $request->description
                ]);
                if($update){
                    return $this->index();
                }
            }
        }catch(Throwable $th){
            return $th->getMessage();

        }
    }

    public function delete($id){
       try{
            $delete = JobList::find($id)->delete();
            if($delete){
                return $this->index();
            }
       }catch(Throwable $th){
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN , 'error' , $th->getMessage());
       }
    }




}
