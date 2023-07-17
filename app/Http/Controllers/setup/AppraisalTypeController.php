<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\setup\AppraisalType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class AppraisalTypeController extends Controller
{
    public function __construct()
    {
        if (Auth::user()) {
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $appraisalType = AppraisalType::all();
        return view('setup.appraisalType', ['appraisalType' => $appraisalType]);
    }

    public function store(Request $request)
    {
        
        //check for validation 
        try {
            $validation = Validator::make(
                $request->all(),
                [
                    'appaisal_type' => ['required', 'unique:appraisal_types', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'appaisal_type.required' => "The appraisal type field is required",
                    'appaisal_type.unique' => "The appraisal type name  field is unique",

                ]
            );


            
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY, 'Validation Errors', $validation->errors());
            }
            

            $insert = new AppraisalType();
            $insert->appaisal_type = $request->appaisal_type;
            $insert->description = $request->description;

            $save = $insert->save();
            return $this->index();

        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_INTERNAL_SERVER_ERROR, 'error', $th->getMessage());
        }
    }

    // public function search(Request $request){
    //     $promotion = AppointmentType::where($request->filter , "like" , "%".$request->keyword."%")->get();
    //     return view('setup.promotion' , ['promotion'=>$promotion , 'columns'=>$columns]);
    // }

    public function edit($id)
    {

        $appraisalType = AppraisalType::all();
        $find = AppraisalType::find($id);
        return view('setup.appraisalType', ['appraisalType' => $appraisalType, 'find' => $find]);
    }

    public function update($id, Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'appaisal_type' => ['required', 'unique:appraisal_types', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'appaisal_type.required' => "The appraisal type name field is required",
                    'appaisal_type.unique' => "The appraisal type name  field is unique",

                ]
            );

            if ($validate->fails()) {
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY, "Validation error", $validate->errors());
            } else {
                $update = AppraisalType::where('id', $id)->update([
                    'appaisal_type' => $request->appaisal_type,
                    'description' => $request->description
                ]);
               
                    return $this->index();
                
            }
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $delete = AppraisalType::find($id)->delete();
            
                return $this->index();
            
        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN, 'error', $th->getMessage());
        }
    }
}
