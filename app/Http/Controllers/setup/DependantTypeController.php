<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\setup\DependentType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;
// use App\Http\Controllers\setup\DependantTypeController;

class DependantTypeController extends Controller
{
    public function __construct()
    {
        if(Auth::user()){
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $dependent_type = DependentType::all();
        return view('setup.dependentType' , ['dependent_type'=> $dependent_type]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try{
            $validation = Validator::make(
                $request->all(),
                [
                    'dependant_name' => ['required', 'unique:dependent_types' , 'string'],
                    'description'=>['max:225']
                ],
                [
                    'dependant_name.required' => "The dependent name field is required",
                    'dependant_name.unique' => "The dependent status field is unique",
                    
                    
                ]
            );
            
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }
    
            // return 1234;
            //save data into database
            $insert = new DependentType();
            $insert->dependant_name = $request->dependant_name;
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
        $dependent_type = DependentType::where('dependant_name' , "like" , "%".$request->keyword."%")->get();
        return view('setup.dependentType' , ['dependent_type'=>$dependent_type]);
    }

    public function edit($id){
        $dependent_type = DependentType::all();
        $find = DependentType::find($id);
        return view('setup.dependentType' , ['dependent_type'=>$dependent_type , 'find'=>$find]);
    }
    
    public function update($id , Request $request){
       
        try{
            $validate = Validator::make($request->all() ,  [
                'dependant_name' => ['required', 'unique:dependent_types,id' , 'string'],
                'description'=>['max:225']
            ],
            [
                'dependant_name.required' => "The dependent name field is required",
                'dependant_name.unique' => "The dependent name field is unique",
               
                
            ]);

            if($validate->fails()){
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validate->errors());
            }else{
                $update = DependentType::where('id' , $id)->update([
                    'dependant_name'=>$request->dependant_name ,
                   
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
            $delete = DependentType::find($id)->delete();
            if($delete){
                return $this->index();
            }
       }catch(Throwable $th){
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN , 'error' , $th->getMessage());
       }
    }




}
