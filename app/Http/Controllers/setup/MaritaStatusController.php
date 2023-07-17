<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\setup\MaritalStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class MaritaStatusController extends Controller
{
    public function __construct()
    {
        if(Auth::user()){
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $marital_status = MaritalStatus::all();
        return view('setup.maritalStatus' , ['marital_status'=> $marital_status]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try{
            $validation = Validator::make(
                $request->all(),
                [
                    'marital_status_name' => ['required', 'unique:marital_statuses' , 'string'],
                    'code' => ['required', 'integer'],
                    'description'=>['max:225']
                ],
                [
                    'marital_status_name.required' => "The marital status name field is required",
                    'marital_status_name.unique' => "The marital status field is unique",
                    'code.required' => "The code field is required",
                    
                ]
            );
            
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }
    
            // return 1234;
            //save data into database
            $insert = new MaritalStatus();
            $insert->marital_status_name = $request->marital_status_name;
            $insert->code = $request->code;
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
        $marital_status = MaritalStatus::where('marital_status_name' , "like" , "%".$request->keyword."%")->get();
        return view('setup.maritalStatus' , ['marital_status'=>$marital_status]);
    }

    public function edit($id){
        $marital_status = MaritalStatus::all();
        $find = MaritalStatus::find($id);
        return view('setup.maritalStatus' , ['marital_status'=>$marital_status , 'find'=>$find]);
    }
    
    public function update($id , Request $request){
       
        try{
            $validate = Validator::make($request->all() ,  [
                'marital_status_name' => ['required', 'unique:marital_statuses,id' , 'string'],
                'code' => ['required', 'integer'],
                'description'=>['max:225']
            ],
            [
                'marital_status_name.required' => "The marital_status name field is required",
                'marital_status_name.unique' => "The marital status field is unique",
                'code.required' => "The code field is required",
                
            ]);

            if($validate->fails()){
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validate->errors());
            }else{
                $update = MaritalStatus::where('id' , $id)->update([
                    'marital_status_name'=>$request->marital_status_name ,
                    'code'=>$request->code,
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
            $delete = MaritalStatus::find($id)->delete();
            if($delete){
                return $this->index();
            }
       }catch(Throwable $th){
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN , 'error' , $th->getMessage());
       }
    }




}
