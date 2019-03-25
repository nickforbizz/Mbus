<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class pagesController extends Controller
{
    public function welcome() {
        return view('admin.welcome');
    }
    public function well() {
        return view('admin.well');
    }

    public function about() {
        return view('admin.about');
    }

    public function contact() {
        return view('admin.contact');
    }

    // users
    public function user() {
        return view('admin.users.user');
    }

    public function addUser() {
        return view('admin.users.addUser');
    }

    public function driver() {
        return view('admin.users.driver');
    }

    public function conductor() {
        return view('admin.users.conductor');
    }

    public function passanger() {
        return view('admin.users.passanger');
    }

    public function employee() {
        return view('admin.users.employee');
    }

    public function assignRole($user_id) {
        $validator = \Validator::make(["user_id"=>$user_id], [
            'user_id'=> 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            $output['tag']=-1;
            $output['errors']=$validator->errors();
            return redirect(url("user"));
        }
        $id = $user_id;
        return view('admin.users.assignRole', compact('id'));
    }

    // bus
    public function bus()
    {
        $buses = Bus::where('status', '1')->get();
        return view("admin.bus.view_bus", compact('buses'));
    }

    public function addBus()
    {
        return view("admin.bus.addBus");
    }

    public function editBus($bus_id) {
        $validator = \Validator::make(["bus_id"=>$bus_id], [
            'bus_id'=> 'required|exists:bus,id'
        ]);

        if ($validator->fails()) {
            $output['tag']=-1;
            $output['errors']=$validator->errors();
            return redirect(url("bus"));
        }
        $id = $bus_id;
        return view('admin.bus.editBus', compact('id'));
    }

    public function maintenance()
    {
        return view("bus.maintenance");
    }

    public function busRoute()
    {
        return view("bus.busRoute");
    }

    // expenses
    public function salary()
    {
        return view("expences.salary");
    }
    public function user_damages()
    {
        return view("expences.user_damages");
    }
    public function deductions()
    {
        return view("expences.deductions");
    }


    // Trip
    public function trip()
    {
        return view("admin.trip");
    }
     // Ticket
     public function ticket()
     {
         return view("admin.tickets");
     }
}
