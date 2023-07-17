<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\setup\SalaryGradeNotch;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class SalaryGradeNotchController extends Controller
{
    public function __construct()
    {
        if (Auth::user()) {
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $salaryGradeNotch = SalaryGradeNotch::all();
        return view('setup.salary_grade_notch', ['salaryGradeNotch' => $salaryGradeNotch]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try {
            $validation = Validator::make(
                $request->all(),
                [
                    'salary_type_code' => ['required', 'unique:salary_grade_notches', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'salary_type_code.required' => "The salary type field is required",
                    'salary_type_code.unique' => "The salary type  field is unique",

                ]
            );

            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }

            // return 1234;
            //save data into database
            $insert = new SalaryGradeNotch();
            $insert->salary_type_code = $request->salary_type_code;
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

        $salaryGradeNotch = SalaryGradeNotch::all();
        $find = SalaryGradeNotch::find($id);
        return view('setup.salary_grade_notch', ['salaryGradeNotch' => $salaryGradeNotch, 'find' => $find]);
    }

    public function update($id, Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'salary_type_code' => ['required', 'unique:salary_grade_notches,id', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'salary_type_code.required' => "The appointment type name field is required",
                    'salary_type_code.unique' => "The appointment type name  field is unique",

                ]
            );

            if ($validate->fails()) {
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY, "Validation error", $validate->errors());
            } else {
                $update = SalaryGradeNotch::where('id', $id)->update([
                    'salary_type_code' => $request->salary_type_code,
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
            $delete = SalaryGradeNotch::find($id)->delete();
            
                return $this->index();
            
        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN, 'error', $th->getMessage());
        }
    }
}
