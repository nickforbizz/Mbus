<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Bus;
use App\Models\Maintenance;


use Illuminate\Support\Facades\DB;


class busController extends Controller
{
    
    public function register(Request $request){
        
        try{
            DB::beginTransaction();

                    
                    $validator = Validator::make($request->all(), [
                        'bus_number' => 'required',
                        'capacity' => 'required',
                        'model' => 'required',
                        'owner' => 'required',

                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }
                   

                    $bus=new Bus([
                        'maintenance_id'=>$maintenance->id,
                        'bus_number'=>$request->bus_number,
                        'capacity'=>$request->capacity, 
                        'model'=>$request->model, 
                        'owner'=>$request->owner, 

                    ]);

                    $bus->saveOrFail();

                    DB::commit();
                    
            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$bus
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
