<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class pagesController extends Controller
{
    public function welcome() {
        return view('welcome');
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }

    // users
    public function user() {
        return view('users.user');
    }

    public function addUser() {
        return view('users.addUser');
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
        return view('users.assignRole', compact('id'));
    }

    // bus
    public function bus()
    {
        $busses = Bus::where('status', '1')->get();
        return view("bus.view_bus", compact('busses'));
    }

    public function addBus()
    {
        return view("bus.addBus");
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
        return view('bus.editBus', compact('id'));
    }

    public function maintenance()
    {
        return view("bus.maintenance");
    }

}
