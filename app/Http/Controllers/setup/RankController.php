<?php

namespace App\Http\Controllers\setup;

use Throwable;
use App\Models\setup\Rank;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\setup\DepartmentList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class RankController extends Controller
{
    public function __construct()
    {
        if(Auth::user()){
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $rank = Rank::orderBy('created_at' , "ASC")->get();
        $department = DepartmentList::all();
       
        return view('setup.rank' , ['rank'=> $rank , "department" => $department ]);
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
                    'position_name' => ['required', 'unique:ranks' , 'string'],
                    'department' => ['required', 'string'],
                    'rank_description' => ['required', 'string'],
                    
                ]
            );
            
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }
    
            
            //save data into database
            $insert = new Rank();
            $insert->position_name = $request->position_name;
            $insert->department = $request->department;
            $insert->rank_description = $request->rank_description;
        
            $save = $insert->save();
            if ($save)
                return $this->index();
            }
        catch(Throwable $th){
                return (new ResponseController)->response(Response::HTTP_INTERNAL_SERVER_ERROR , 'error' , $th->getMessage());
        }
    }

    // // public function search(Request $request){
    // //     $jobList = JobList::where('marital_status_name' , "like" , "%".$request->keyword."%")->get();
    // //     return view('setup.maritalStatus' , ['marital_status'=>$marital_status]);
    // // }

    public function edit($id){
        $rank = Rank::all();
        $find = Rank::find($id);
        $department = DepartmentList::all();
       
        return view('setup.rank' , ['rank'=>$rank,'department'=>$department , 'find'=>$find]);
    }
    
    public function update($id , Request $request){
       
        try{
            $validate = Validator::make($request->all() ,     [
                'position_name' => ['required', 'unique:ranks' , 'string'],
                'department' => ['required', 'string'],
                'rank_description' => ['required', 'string'],
            ]);

            if($validate->fails()){
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validate->errors());
            }else{
                $update = Rank::where('id' , $id)->update([
                    'position_name'=>$request->position_name ,
                    'department'=>$request->department,
                    'rank_description'=>$request->rank_description,
                    
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
            $delete = Rank::find($id)->delete();
            if($delete){
                return $this->index();
            }
       }catch(Throwable $th){
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN , 'error' , $th->getMessage());
       }
    }




}
