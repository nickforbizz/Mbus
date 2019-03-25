<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\AnonymousMsg;

class webController extends Controller
{
    //
    public function about()
    {
        return view('layouts.pages.about');
    }

    public function contact()
    {
        return view('layouts.pages.contact');
    }

    public function blog()
    {
        return view('layouts.pages.blog');
    }

    public function ticket()
    {
        return view('layouts.pages.ticketing');
    }


    public function ticketRoute($id)
    {
        /** @var Bus $bus */
        $bus = \App\Models\Bus::find($id);

        $drivers=collect($bus->drivers()->get())->map(function (Driver $driver){
            return $driver->user;
        });

        $col_ticket = collect($bus)
                      ->put("Busroute", $bus->Busroute)
                      ->put("ticketLast", DB::table('ticket')->latest()->first())
                      ->put("Drivers", $drivers)
                      ->put("Busroute", $bus->busroute);

         return ($col_ticket);
    }




    public function bookTicket(Request $request){

        try{
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'bus_id' => 'required|exists:bus,id',
                'route_id' => 'required|exists:busroute,id',
                'ticket_number' => 'required',
                'passanger_name' => 'required',
                'passanger_id' => 'required',
                'booked_at' => 'required',
                'exp_at' => 'required',
                'amount' => 'required',
            ]);

            if ($validator->fails()) {
                $output['tag']=-1;
                $output['errors']=$validator->errors();
                return $output;
            }

            $ticket =new Ticket([
                'ticket_number'=>$request->ticket_number,
                'passanger_name'=>$request->passanger_name,
                'passanger_id'=>$request->passanger_id,
                'bus_id'=>$request->bus_id,
                'route_id'=>$request->route_id,
                'amount'=>$request->amount,
                'date_booked'=>$request->booked_at,
                'date_to_expire'=>$request->exp_at,

            ]);

            $ticket->saveOrFail();

            DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$ticket
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

    public function contactMessage(Request $request){
        try{
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'contact_name' => 'required',
                'contact_email' => 'required|email',
                'contact_msg' => 'required',

            ]);

            if ($validator->fails()) {
                $output['tag']=-1;
                $output['errors']=$validator->errors();
                return $output;
            }

            $anonymous_msg =new AnonymousMsg([
                'contact_name' => $request->contact_name,
                'contact_email' =>$request->contact_email,
                'contact_msg' => $request->contact_msg,

            ]);

            $anonymous_msg->saveOrFail();

            DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$anonymous_msg
            ];
        }catch(\Exception $e){
            DB::rollBack();
            report($e);

            return [
                "code"=>"-1",
                "message"=>$e->getMessage()
            ];

        }
        return "done";
    }



}
