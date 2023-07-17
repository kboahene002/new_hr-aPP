<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\setup\DisciplinaryType;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class DisciplinaryTypeController extends Controller
{
    public function __construct()
    {
        if (Auth::user()) {
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $disciplinaryType = DisciplinaryType::all();
        return view('setup.disciplinary', ['disciplinaryType' => $disciplinaryType]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try {
            $validation = Validator::make(
                $request->all(),
                [
                    'disciplinary_type' => ['required', 'unique:disciplinary_Types', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'disciplinaryType.required' => "The disciplinary type name field is required",
                    'disciplinaryType.unique' => "The disciplinary type name  field is unique",

                ]
            );

            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }

            // return 1234;
            //save data into database
            $insert = new DisciplinaryType();
            $insert->disciplinary_type = $request->disciplinary_type;
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

        $disciplinaryType = DisciplinaryType::all();
        $find = DisciplinaryType::find($id);
        return view('setup.disciplinary', ['disciplinaryType' => $disciplinaryType, 'find' => $find]);
    }

    public function update($id, Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'disciplinary_type' => ['required', 'unique:disciplinary_types', 'string'],
                    'description' => ['max:225']
                ],
                [
                    'disciplinary_type.required' => "The disciplinary type field is required",
                    'disciplinary_type.unique' => "The disciplinary type  field is unique",
                ]
            );

            if ($validate->fails()) {
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY, "Validation error", $validate->errors());
            } else {
                $update = DisciplinaryType::where('id', $id)->update([
                    'disciplinary_type' => $request->disciplinary_type,
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
            $delete = DisciplinaryType::find($id)->delete();
            
                return $this->index();
            
        } catch (Throwable $th) {
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN, 'error', $th->getMessage());
        }
    }
}
