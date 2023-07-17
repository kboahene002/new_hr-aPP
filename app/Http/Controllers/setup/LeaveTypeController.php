<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\setup\LeaveType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class LeaveTypeController extends Controller
{
    public function __construct()
    {
        if (Auth::user()) {
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $leaveType = LeaveType::all();
        return view('setup.leaveType', ['leaveType' => $leaveType]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try {
            $validation = Validator::make(
                $request->all(),
                [
                    'leave_type' => ['required', 'unique:leave_types', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'leave_type.required' => "The leave type  field is required",
                    'leave_type.unique' => "The leave type field is unique",

                ]
            );

            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }

            // return 1234;
            //save data into database
            $insert = new LeaveType();
            $insert->leave_type = $request->leave_type;
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

        $leaveType = LeaveType::all();
        $find = LeaveType::find($id);
        return view('setup.leaveType', ['leaveType' => $leaveType, 'find' => $find]);
    }

    public function update($id, Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'leave_type' => ['required', 'unique:leave_types', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'leave_type.required' => "The leave type  field is required",
                    'leave_type.unique' => "The leave type field is unique",

                ]
            );

            if ($validate->fails()) {
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY, "Validation error", $validate->errors());
            } else {
                $update = LeaveType::where('id', $id)->update([
                    'leave_type' => $request->leave_type,
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
            $delete = LeaveType::find($id)->delete();
            
                return $this->index();
            
        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN, 'error', $th->getMessage());
        }
    }
}
