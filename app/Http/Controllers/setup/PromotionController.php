<?php

namespace App\Http\Controllers\setup;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\setup\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\response\ResponseController;

class PromotionController extends Controller
{
    public function __construct()
    {
        if(Auth::user()){
            return redirect()->route('login');
        }
    }

    public function index()
    {
       
        $promotion = Promotion::all();
        return view('setup.promotion' , ['promotion'=> $promotion ]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        //check for validation 
        try{
            $validation = Validator::make(
                $request->all(),
                [
                    'promotion_name' => ['required', 'unique:promotions' , 'string'],
                    'description'=>['max:225']
                ],
                [
                    'promotion_name.required' => "The promotion name field is required",
                    'promotion_name.unique' => "The promotion name  field is unique",
                    
        
                    
                ]
            );
            
            if ($validation->fails()) {
                return (new ResponseController)->response(Response::HTTP_OK, 'Validation Errors', $validation->errors());
            }
    
            // return 1234;
            //save data into database
            $insert = new Promotion();
            $insert->promotion_name = $request->promotion_name;
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
        $tableName = 'promotions';
        $excludedColumns = ['id', 'created_at' ,'updated_at'];
        $columns = Schema::getColumnListing($tableName);
        $columns = array_diff($columns, $excludedColumns);
        $promotion = Promotion::where($request->filter , "like" , "%".$request->keyword."%")->get();
        return view('setup.promotion' , ['promotion'=>$promotion , 'columns'=>$columns]);
    }

    public function edit($id){
        $tableName = 'promotions';
        $excludedColumns = ['id', 'created_at' ,'updated_at'];
        $columns = Schema::getColumnListing($tableName);
        $columns = array_diff($columns, $excludedColumns);
        $promotion = Promotion::all();
        $find = Promotion::find($id);
        return view('setup.promotion' , ['promotion'=>$promotion , 'columns'=>$columns ,'find'=>$find]);
    }
    
    public function update($id , Request $request){
        try{
            $validate = Validator::make($request->all() ,   [
                'promotion_name' => ['required', 'unique:promotions' , 'string'],
                'description'=>['max:225']
            ],
            [
                'promotion_name.required' => "The promotion name field is required",
                'promotion_name.unique' => "The promotion name  field is unique",
                
    
                
            ]);

            if($validate->fails()){
                return (new ResponseController)->response(Response::HTTP_UNPROCESSABLE_ENTITY , "Validation error" , $validate->errors());
            }else{
                $update = Promotion::where('id' , $id)->update([
                    'promotion_name'=>$request->promotion_name ,
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
            $delete = Promotion::find($id)->delete();
            if($delete){
                return $this->index();
            }
       }catch(Throwable $th){
            return (new ResponseController)->response(Response::HTTP_FORBIDDEN , 'error' , $th->getMessage());
       }
    }




}
