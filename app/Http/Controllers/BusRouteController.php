<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Busroute;



use Illuminate\Support\Facades\DB;


class BusrouteController extends Controller
{
    
    public function register(Request $request){
        
        try{
            DB::beginTransaction();

                    
                    $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'distance' => 'required',
                        'a_coodinates' => 'required',
                        'b_coodinates' => 'required',
                        'a_terminal' => 'required',
                        'b_terminal' => 'required',

                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }


                    $route=new Busroute([
                        'name'=>$request->name, 
                        'distance'=>$request->distance, 
                        'a_coodinates'=>$request->a_coodinates, 
                        'b_coodinates'=>$request->b_coodinates, 
                        'a_terminal'=>$request->a_terminal, 
                        'b_terminal'=>$request->b_terminal, 
                        
                    ]);

                    $route->saveOrFail();


                    DB::commit();
                    
            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$route
            ];
        }catch(\Exception $e){
            DB::rollBack();
            report($e);

            return [
                "code"=>"-1",
                "message"=>$e->getMessage()
            ];

        }
    }

}
