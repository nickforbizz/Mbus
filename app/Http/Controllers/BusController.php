<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Bus;
use App\Models\Busroute;
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
                        'maintenance_id' => 'required|exists:maintenance,id',
                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                    $maintenance = Maintenance::find($request->maintenance_id);                   

                    $bus=new Bus([
                        'bus_number'=>$request->bus_number,
                        'capacity'=>$request->capacity, 
                        'model'=>$request->model, 
                        'owner'=>$request->owner,
                        'maintenance_id'=>$maintenance->id,
                        // '_token'=>$request->_token
                    ]);

                    $bus->saveOrFail();
                    $bus->maintenance;
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

    public function updateBus(Request $request)
    {
        try{
            DB::beginTransaction();               
            
                    $validator = Validator::make($request->all(), [
                        'bus_id' => 'required|exists:bus,id',
                        'maintenance_id' => 'required|exists:maintenance,id',
                        'bus_number' => 'sometimes',
                        'capacity' => 'sometimes',
                        'model' => 'sometimes',
                        'owner' => 'sometimes',
                       
                    ]);

                    $busDetails = Bus::find($request->bus_id); 


                    $maintenanceDetails = Maintenance::find($busDetails->maintenance_id);        
                    // $maintenanceDetails->title = $request->title;                
                    // $maintenanceDetails->update();
                                
                    $busDetails->bus_number = $request->bus_number;
                    $busDetails->capacity = $request->capacity;
                    $busDetails->model = $request->model;
                    $busDetails->maintenance_id = $maintenanceDetails->id;
        

                    $busDetails->update();
                    
                   
                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }                   

                DB::commit();
                    
            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$busDetails
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

    public function addMaintenance (Request $request)
    {
        try{
            DB::beginTransaction();                    
                    $validator = Validator::make($request->all(), [
                        'title' => 'required',
                        'costs' => 'required',
                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                    $maintenance=new Maintenance([
                        'title'=>$request->title,
                        'costs'=>$request->costs, 
                    ]);

                    $maintenance->saveOrFail();
                    DB::commit();
                    
            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$maintenance
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

    public function updateMaintenance(Request $request){
        try{
            DB::beginTransaction();               
            
                    $validator = Validator::make($request->all(), [
                        'maintenance_id' => 'required|exists:maintenance,id',
                        'utitle' => 'sometimes',
                        'ucosts' => 'sometimes',                       
                    ]);

                    $maintenanceDetails = Maintenance::find($request->maintenance_id);        
                    $maintenanceDetails->title = $request->utitle;                
                    $maintenanceDetails->costs = $request->ucosts; 

                    $maintenanceDetails->update();              
                   
                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }                   

                DB::commit();
                    
            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$maintenanceDetails
            ];
        }catch(\Exception $e){
            DB::rollBack();
            report($e);

            return [
                "code"=>"-1",
                "message"=>$e->getMessage()
            ];
        }


        // catched
    }

    public function addBusroute (Request $request)
    {
        try{
            DB::beginTransaction();                    
                                    
                    $validator = Validator::make($request->all(), [
                        'r_name' => 'required',
                        'r_distance' => 'required',
                        'terminal_a' => 'required',
                        'terminal_b' => 'required',

                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }


                    $busroute=new Busroute([
                        'name'=>$request->r_name, 
                        'distance'=>$request->r_distance, 
                        'a_coodinates'=>$request->terminal_a_cod, 
                        'b_coodinates'=>$request->terminal_b_cod, 
                        'stops'=>$request->r_stops, 
                        'a_terminal'=>$request->terminal_a, 
                        'b_terminal'=>$request->terminal_b, 
                        
                    ]);

                    $busroute->saveOrFail();
                    

                    $busroute->saveOrFail();
                    DB::commit();
                    
            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$busroute
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

    public function updateBusroute(Request $request){
        try{
            DB::beginTransaction();               
            
                    $validator = Validator::make($request->all(), [
                        'busroute_id' => 'required|exists:busroute,id',
                        'uname' => 'sometimes',
                        'ustops' => 'sometimes',                       
                        'a_terminal' => 'sometimes',                       
                        'b_terminal' => 'sometimes',                       
                    ]);

                    $busrouteDetails = Busroute::find($request->busroute_id);        
                    $busrouteDetails->name = $request->uname;                
                    $busrouteDetails->a_terminal = $request->a_terminal;                
                    $busrouteDetails->b_terminal = $request->b_terminal;                
                    $busrouteDetails->stops = $request->ustops; 

                    $busrouteDetails->update();              
                   
                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }                   

                DB::commit();
                    
            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$busrouteDetails
            ];
        }catch(\Exception $e){
            DB::rollBack();
            report($e);

            return [
                "code"=>"-1",
                "message"=>$e->getMessage()
            ];
        }
        // return $request;
    }

}


