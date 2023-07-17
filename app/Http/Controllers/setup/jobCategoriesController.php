<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\setup\JobCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class jobCategoriesController extends Controller
{
    public function index(){
        
        $job_category = JobCategories::all();
        return view('setup.jobCategories' , ['jobCategory'=>$job_category]);
    }

    public function store(Request $request){
        try{
            $validation = Validator::make($request->all(), [
                'job_category_name' => 'required|unique:job_categories',
            ], [
                'job_category_name.required' => 'Job Category Name is Required',
                'job_category_name.unique' => 'Job Category Name Already Exists',
            ]);
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation Errors" , $validation->errors());
            }

            $jobCategory = new JobCategories();
            $jobCategory->job_category_name = $request->job_category_name;
            $jobCategory->description = $request->description;
            $jobCategory->save();

            if ($jobCategory) {
                return $this->index();
            }
            
        }catch (\Throwable $th) {
            return $th->getMessage();
        }

        
    }

    public function search(Request $request){
        $job_category = JobCategories::where('job_category_name' , "like" , "%".$request->keyword."%")->get();
        return view('setup.jobCategory' , ['jobCategory'=>$job_category]);
    }

    public function edit($id){
        $job_category = JobCategories::all();
        $find = JobCategories::find($id);
        return view('setup.JobCategory' , ['jobCategory'=>$job_category , 'find'=>$find]);
    }

    public function update($id , Request $request){
       
        try{
            $validate = Validator::make($request->all() ,  [
                'job_category_name' => 'required|unique:job_categories,id',
            ], [
                'job_category_name.required' => 'Job Category Name is Required',
                'job_category_name.unique' => 'Job Category Name Already Exists',
            ]);

            if($validate->fails()){
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validate->errors());
            }else{
                $update = JobCategories::where('id' , $id)->update([
                    'job_category_name'=>$request->job_category_name ,
                    'description'=>$request->description,
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
            $delete = JobCategories::find($id)->delete();
            if($delete){
                return $this->index();
            }
       }catch(Throwable $th){
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN , 'error' , $th->getMessage());
       }
    }
}
