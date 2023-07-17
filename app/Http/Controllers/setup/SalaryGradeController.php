<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\setup\SalaryGrade;
use App\Http\Controllers\Controller;

use App\Models\setup\SalaryGradeNotch;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class SalaryGradeController extends Controller
{
    public function index($id)
    {
        $salaryGrade = SalaryGradeNotch::with('salaryGrade')->where('id', $id)->first();
        return view('setup.salary_grade', ['salaryGrade' => $salaryGrade->salaryGrade, 'id' => $id]);
    }

    public function store(Request $request, $id)
    {
        // return $request->all();
        //check for validation 
        try {
            $validation = Validator::make(
                $request->all(),
                [
                    'pay_grade' => ['required', 'unique:salary_grades', 'string'],
                    'pay_grade_code' => ['required', 'string'],
                    'level' => ['required', 'integer'],
                    'no_of_notches' => ['required', 'integer'],
                    'notch_jump' => ['required', 'integer'],
                    'leave_days' => ['required', 'integer'],
                    'description' => ['max:225']
                ],

            );

            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }


            // return 1234;
            //save data into database
            $insert = new SalaryGrade();
            $insert->pay_grade = $request->pay_grade;
            $insert->pay_grade_code = $request->pay_grade_code;
            $insert->level = $request->level;
            $insert->no_of_notches = $request->no_of_notches;
            $insert->notch_jump = $request->notch_jump;
            $insert->leave_days = $request->leave_days;
            $insert->description = $request->description;
            $salaryGradeNotch = SalaryGradeNotch::where('id' , $id)->first();
            // $insert = $insert->toArray();
            $salaryGradeNotch->salaryGrade()->save($insert);
            return $this->index($id);
        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_INTERNAL_SERVER_ERROR, 'error', $th->getMessage());
        }
    }

    public function edit($reference ,$id)
    {
        $salaryGrade = SalaryGradeNotch::with('salaryGrade')->where('id', $reference)->first();
        $find = SalaryGrade::find($id);
        // return $salaryGrade;
        return view('setup.salary_grade', ['salaryGrade' => $salaryGrade->salaryGrade, 'id'=>$reference, 'find' => $find]);
    }

    public function update($id, $reference, Request $request)
    {
        try {
            
            $validate = Validator::make(
                $request->all(),
                [
                    'pay_grade' => ['required', 'unique:salary_grades,id', 'string'],
                    'pay_grade_code' => ['required', 'string'],
                    'level' => ['required', 'integer'],
                    'no_of_notches' => ['required', 'integer'],
                    'notch_jump' => ['required', 'integer'],
                    'leave_days' => ['required', 'integer'],
                    'description' => ['max:225']
                ],
            );

            if ($validate->fails()) {
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY, "Validation error", $validate->errors());
            } else {
                
                 SalaryGrade::where('id', $reference)->update([
                    'pay_grade' => $request->pay_grade,
                    'pay_grade_code' => $request->pay_grade_code,
                    'level' => $request->level,
                    'no_of_notches' => $request->no_of_notches,
                    'notch_jump' => $request->notch_jump,
                    'leave_days' => $request->leave_days,
                    'description' => $request->description
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
            // return [$id , $reference];
            $delete = SalaryGrade::where('id' , $reference)->delete();
            // return $reference;
            return $this->index($id);
            
        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN, 'error', $th->getMessage());
        }
    }


}
