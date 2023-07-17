<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\setup\StaffStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class StaffStatusController extends Controller
{
    public function __construct()
    {
        if(Auth::user()){
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $staff_status = StaffStatus::all();
        return view('setup.staffStatus' , ['staff_status'=> $staff_status]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try{
            
            $validation = Validator::make(
                $request->all(),
                [
                    'staff_status_name' => ['required', 'unique:staff_statuses' , 'string'],
                    'description'=>['max:225']
                ],
                [
                    'staff_status_name.required' => "The staff status name field is required",
                    'staff_status_name.unique' => "The staff status field is unique",
                    
                    
                ]
            );
            
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }
    
            // return 1234;
            //save data into database
            $insert = new StaffStatus();
            $insert->staff_status_name = $request->staff_status_name;
            $insert->description = $request->description;
            $save = $insert->save();

            if ($save)
                return $this->index();
            }
        catch(Throwable $th){
                return (new ResponseController)->response(Response::HTTP_INTERNAL_SERVER_ERROR , 'error' , $th->getMessage());
        }
    }

    public function search(Request $request){
        $staff_status = StaffStatus::where('staff_status_name' , "like" , "%".$request->keyword."%")->get();
        return view('setup.staffStatus' , ['staff_status'=>$staff_status]);
    }

    public function edit($id){
        $staff_status = StaffStatus::all();
        $find = StaffStatus::find($id);
        return view('setup.staffStatus' , ['staff_status'=>$staff_status , 'find'=>$find]);
    }
    
    public function update($id , Request $request){
       
        try{
            $validate = Validator::make($request->all() ,  [
                'staff_status_name' => ['required', 'unique:staff_statuses,id' , 'string'],
                'description'=>['max:225']
            ],
            [
                'staff_status_name.required' => "The staff status name field is required",
                
                
            ]);

            if($validate->fails()){
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validate->errors());
            }else{
                $update = StaffStatus::where('id' , $id)->update([
                    'staff_status_name'=>$request->staff_status_name ,
                
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
            $delete = StaffStatus::find($id)->delete();
            if($delete){
                return $this->index();
            }
       }catch(Throwable $th){
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN , 'error' , $th->getMessage());
       }
    }




}
