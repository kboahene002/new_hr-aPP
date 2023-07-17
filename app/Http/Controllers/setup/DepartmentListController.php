<?php

namespace App\Http\Controllers\setup;

use toastr;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\setup\DepartmentList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;


class DepartmentListController extends Controller
{

    public function __construct()
    {
        if(Auth::user()){
            return redirect()->route('login');
        }
    }
    public function index()
    {
        $department_list = DepartmentList::all();
        return view('setup.departmentList' , ['department_list'=>$department_list]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try{
            $validation = Validator::make(
                $request->all(),
                [
                    'departmentName' => ['required', 'unique:department_lists' , 'string'],
                    'division_name' => ['required', 'string'],
                    'position' => ['required'],
                    'description'=>['max:225']
                ],
                [
                    'departmentName.required' => "The department name field is required",
                    'division_name.required' => "The division name field is required",
                    'position.required' => "The division name field is required"
                ]
            );
            
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }
    
            //save data into database
            $insert = new DepartmentList();
            $insert->departmentName = $request->departmentName;
            $insert->divisionName = $request->division_name;
            $insert->descripion = $request->description;
            $insert->position = $request->position;
    
            $save = $insert->save();
         
                // toastr()->error('An error has occurred please try again later.');
                return $this->index();
            }
        catch(Throwable $th){
                return (new ResponseController)->response(Response::HTTP_INTERNAL_SERVER_ERROR , 'error' , $th->getMessage());
        }
    }

    public function search(Request $request){
        $department_list = DepartmentList::where('departmentName' , "like" , "%".$request->keyword."%")->get();
        return view('setup.departmentList' , ['department_list'=>$department_list]);
    }

    public function edit($id){
        $department_list = DepartmentList::all();
        $find = DepartmentList::find($id);
        return view('setup.departmentList' , ['department_list'=>$department_list , 'find'=>$find]);
    }
    
    public function update($id , Request $request){
       
        try{
            $validate = Validator::make($request->all() ,  [
                'departmentName' => ['required', 'unique:department_lists,id' , 'string'],
                'division_name' => ['required', 'string'],
                'position' => ['required'],
                'description'=>['max:225']
            ],
            [
                'departmentName.required' => "The department name field is required",
                'division_name.required' => "The division name field is required",
                'position.required' => "The division name field is required"
            ]);

            if($validate->fails()){
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validate->errors());
            }else{
                $update = DepartmentList::where('id' , $id)->update([
                    'departmentName'=>$request->departmentName ,
                    'divisionName'=>$request->division_name,
                    'position'=> $request->position,
                    'descripion' => $request->description
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
            $delete = DepartmentList::find($id)->delete();
            if($delete){
                return $this->index();
            }
       }catch(Throwable $th){
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN , 'error' , $th->getMessage());
       }
    }
}
