<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\setup\AppointmentType;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class AppointmentTypeController extends Controller
{
    public function __construct()
    {
        if (Auth::user()) {
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $appointmentType = AppointmentType::all();
        return view('setup.appointmentType', ['appointmentType' => $appointmentType]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try {
            $validation = Validator::make(
                $request->all(),
                [
                    'appointment_type' => ['required', 'unique:appointment_types', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'appointment_type.required' => "The appointment type name field is required",
                    'appointment_type.unique' => "The appointment type name  field is unique",

                ]
            );

            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }

            // return 1234;
            //save data into database
            $insert = new AppointmentType();
            $insert->appointment_type = $request->appointment_type;
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

        $appointmentType = AppointmentType::all();
        $find = AppointmentType::find($id);
        return view('setup.appointmentType', ['appointmentType' => $appointmentType, 'find' => $find]);
    }

    public function update($id, Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'appointment_type' => ['required', 'unique:appointment_types', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'appointment_type.required' => "The appointment type field is required",
                    'appointment_type.unique' => "The appointment type  field is unique",
                ]
            );

            if ($validate->fails()) {
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY, "Validation error", $validate->errors());
            } else {
                $update = AppointmentType::where('id', $id)->update([
                    'appointment_type' => $request->appointment_type,
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
            $delete = AppointmentType::find($id)->delete();
            
                return $this->index();
            
        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN, 'error', $th->getMessage());
        }
    }
}
