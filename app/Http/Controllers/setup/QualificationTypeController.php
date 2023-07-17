<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
// use App\Models\setup\MaritalStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\setup\QualificationType;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class QualificationTypeController extends Controller
{
    public function __construct()
    {
        if(Auth::user()){
            return redirect()->route('login');
        }
    }

    public function index()
    {
        
        $qualification_type = QualificationType::all();
        return view('setup.qualificationType' , ['qualification_type'=> $qualification_type ]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try{
            $validation = Validator::make(
                $request->all(),
                [
                    'qualification_level' => ['required', 'unique:qualification_types' , 'string'],
                    'code' => ['required', 'string'],
                    'level' => ['required', 'integer'],
                    'description'=>['max:225']
                ],
                [
                    'qualification_level.required' => "The qualification level field is required",
                    'qualification_level.unique' => "The qualification level field is unique",
                    'code.required' => "The code field is required",
                    'level.required' => "The level field is required",
                    
                ]
            );
            
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }
    
            // return 1234;
            //save data into database
            $insert = new QualificationType();
            $insert->qualification_level = $request->qualification_level;
            $insert->code = $request->code;
            $insert->level = $request->level;
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
        
        $qualification_type = QualificationType::where($request->filter , "like" , "%".$request->keyword."%")->get();
        return view('setup.qualificationType' , ['qualification_type'=>$qualification_type ]);
    }

    public function edit($id){
       
        $qualification_type = QualificationType::all();
        $find = QualificationType::find($id);
        return view('setup.qualificationType' , ['qualification_type'=>$qualification_type  ,'find'=>$find]);
    }
    
    public function update($id , Request $request){
       
        try{
            $validate = Validator::make($request->all() ,   [
                'qualification_level' => ['required', 'unique:qualification_types,id' , 'string'],
                'code' => ['required', 'string'],
                'level' => ['required', 'integer'],
                'description'=>['max:225']
            ],
            [
                'marital_status_name.required' => "The marital status name field is required",
                'marital_status_name.unique' => "The marital status field is unique",
                'code.required' => "The code field is required",
                'level.required' => "The code field is required",
                
            ]);

            if($validate->fails()){
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validate->errors());
            }else{
                $update = QualificationType::where('id' , $id)->update([
                    'qualification_level'=>$request->qualification_level ,
                    'code'=>$request->code,
                    'level'=>$request->level,
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
            $delete = QualificationType::find($id)->delete();
            if($delete){
                return $this->index();
            }
       }catch(Throwable $th){
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN , 'error' , $th->getMessage());
       }
    }




}
