<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\setup\SalaryGrade;
use App\Models\setup\SalaryNotch;
use App\Http\Controllers\Controller;
use App\Models\setup\SalaryGradeNotch;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class SalaryNotchController extends Controller
{
    public function index($id)
    {
        $salaryGrade = SalaryGrade::where('salary_grade_notch_id' , $id)->get();
        $salaryNotch = SalaryGradeNotch::with('salaryNotch')->where('id' , $id)->first();
        return view('setup.salary_notch', ['salaryGrade' => $salaryGrade, 'salaryNotch'=>$salaryNotch->salaryNotch,  'id' => $id]);
    }

    public function store(Request $request, $id)
    {
        // return $request->all();
        //check for validation 
        try {
            
           
            $validation = Validator::make(
                $request->all(),
                [
                    'pay_grade' => ['required',  'string'],
                    'notch_position' => ['required', 'integer'],
                    'currency' => ['required', 'string'],
                    'annual_salary' => ['required', 'integer'],
                    'salary_code' => ['required', 'string'],
                    'description' => ['max:225']
                ],

            );

            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }


            $get_salaryGrade = SalaryGrade::where('pay_grade' , $request->pay_grade)->first();
            //save data into database
            $insert = new SalaryNotch();
            $insert->pay_grade = $request->pay_grade;
            $insert->level = $get_salaryGrade->level;
            $insert->notch_position = $request->notch_position;
            $insert->currency = $request->currency;
            $insert->annual_salary = $request->annual_salary;
            $insert->salary_code = $request->salary_code;
            $insert->description = $request->description;

            $salaryGradeNotch = SalaryGradeNotch::where('id' , $id)->first();
            $salaryGradeNotch->salaryNotch()->save($insert);
            return $this->index($id);

        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_INTERNAL_SERVER_ERROR, 'error', $th->getMessage());
        }
    }


    public function edit($reference ,$id)
    {
        // return $reference;
        $salaryNotch = SalaryGradeNotch::with('salaryNotch')->where('id' , $reference)->first();
        $salaryGrade = SalaryGrade::where('salary_grade_notch_id' , $reference)->get();
        $find = SalaryNotch::find($id);
        return view('setup.salary_notch', ['salaryGrade' => $salaryGrade, 'salaryNotch'=>$salaryNotch->salaryNotch, 'id'=>$reference, 'find' => $find]);
    }

    public function update($id, $reference, Request $request)
    {
        try {
            
            $validate = Validator::make(
                $request->all(),
                [
                    'pay_grade' => ['required',  'string'],
                    'notch_position' => ['required', 'integer'],
                    'currency' => ['required', 'string'],
                    'annual_salary' => ['required', 'integer'],
                    'salary_code' => ['required', 'integer'],
                    'description' => ['max:225']
                ],
            );


            if ($validate->fails()) {
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY, "Validation error", $validate->errors());
            } else {
                $get_salaryGrade = SalaryGrade::where('pay_grade' , $request->pay_grade)->first();

                SalaryNotch::where('id' , $reference)->update([
                    'pay_grade'=> $request->pay_grade,
                    'notch_position'=> $request->notch_position,
                    'currency'=>$request->currency,
                    'annual_salary'=>$request->annual_salary,
                    'salary_code'=>$request->salary_code,
                    'level'=>$get_salaryGrade->level,
                    'description'=>$request->description,
                ]);
                
                return $this->index($id);
                
            }
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete($id ,$reference)
    {
        try {
            $delete = SalaryNotch::where('id' , $reference)->delete();
            return $this->index($id);
            
        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN, 'error', $th->getMessage());
        }
    }


}
