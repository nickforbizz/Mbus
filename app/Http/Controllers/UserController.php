<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Contact;
use App\Models\Driver;
use App\Models\Conductor;
use App\Models\Employee;
use App\Models\Passanger;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller

{
    public function register(Request $request){

        try{
            DB::beginTransaction();
                    $validator = Validator::make($request->all(), [
                        'national_id' => 'required',
                        'username' => 'required',
                        'password' => 'required',
                        'fname' => 'required',
                        'sname' => 'required',
                        'age' => 'required',
                        'mobile_number' => 'required',
                        'address' => 'required',
                        'email'=>'required|email',
                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                   $contact = new Contact([
                        'mobile_number' => $request->mobile_number,
                        'address' => $request->address,
                        'telephone_number' => $request->telephone_number,
                   ]);

                   $contact->saveOrFail();

                    $user=new User([
                        'contact_id'=>$contact->id,
                        'national_id'=>$request->national_id,
                        'username'=>$request->username,
                        'password'=>$request->password,
                        'email'=>$request->email,
                        'fname'=>$request->fname,
                        'lname'=>$request->lname,
                        'sname'=>$request->sname,
                        'age'=>$request->age,
                        'gender'=>$request->gender,
                    ]);

                    $user->saveOrFail();

                    $user->contact;

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$user
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

    public function updateUser(Request $request)
    {
        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'user_id' => 'required|exists:users,id',
                        // 'contact_id' => 'required|exists:contact,id',
                        'national_id' => 'sometimes',
                        'username' => 'sometimes',
                        'password' => 'sometimes',
                        'fname' => 'sometimes',
                        'sname' => 'sometimes',
                        'age' => 'sometimes',
                        'mobile_number' => 'sometimes',
                        'address' => 'sometimes',
                        'email'=>'sometimes|email',
                    ]);

                    $userDetails = User::find($request->user_id);
                    $contactDetails = Contact::find($userDetails->contact_id);

                    $contactDetails->mobile_number = $request->mobile_number;
                    $contactDetails->telephone_number = $request->telephone_number;
                    $contactDetails->address = $request->address;

                    $contactDetails->update();

                    $userDetails->national_id = $request->national_id;
                    $userDetails->username = $request->username;
                    $userDetails->email = $request->email;
                    $userDetails->fname = $request->fname;
                    $userDetails->lname = $request->lname;
                    $userDetails->sname = $request->sname;

                    $userDetails->age = $request->age;
                    $userDetails->gender = $request->gender;
                    // $userDetails->occupation = $request->occupation;
                    $userDetails->marital_status = $request->marital_status;
                    // $userDetails->updated_at = $request->updated_at;

                    $userDetails->update();


                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }



                    // $user->update();

                    // $user->contact;

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$contactDetails
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
    // Driver --
    public function updaterDriver(Request $request)
    {
        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'driver_id' => 'required|exists:driver,id',
                        'bus' => 'required|exists:bus,id',
                        'shift' => 'required|exists:shift,id',
                        'emp_status' => 'required'
                    ]);

                    $driver = Driver::findorfail($request->driver_id);

                    $driver->shift_id = $request->shift;
                    $driver->employment_status = $request->emp_status;
                    $driver->bus_id = $request->bus;

                    $driver->update();

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }



                    // $user->update();
                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$driver
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

    public function registerDriver(Request $request){

        try{
            DB::beginTransaction();
                    $validator = Validator::make($request->all(), [
                        'user_id' => 'required|exists:users,id',
                        'salary_id' => 'required|exists:salary,id',
                        'shift_id' => 'required|exists:shift,id',
                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                   $driver = new Driver([
                        'user_id' => $request->user_id,
                        'salary_id' => $request->salary_id,
                        'bus_id' => $request->bus_id,
                        'shift_id' => $request->shift_id,
                        'date_employed' => $request->date_employed,
                   ]);

                   $driver->saveOrFail();

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$driver
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

    // Conductor
    public function updateConductor(Request $request)
    {
        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'conductor_id' => 'required|exists:conductor,id',
                        'bus' => 'required|exists:bus,id',
                        'shift' => 'required|exists:shift,id',
                        'emp_status' => 'required'
                    ]);

                    $conductor = conductor::findorfail($request->conductor_id);

                    // $conductor->shift_id = (!is_null($request->shift)) ? $request->shift : $conductor->shift_id ;
                    // $conductor->employment_status = (!is_null($request->emp_status)) ? $request->emp_status : $conductor->employment_status ;
                    // $conductor->bus_id = (!is_null($request->bus)) ? $request->bus : $conductor->bus_id ;

                    $conductor->shift_id = $request->shift;
                    $conductor->employment_status = $request->emp_status;
                    $conductor->bus_id = $request->bus;

                    $conductor->update();

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }



                    // $user->update();
                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$conductor
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

    public function registerConductor(Request $request){

        try{
            DB::beginTransaction();
                    $validator = Validator::make($request->all(), [
                        'user_id' => 'required|exists:users,id',
                        'salary_id' => 'required|exists:salary,id',
                        'shift_id' => 'required|exists:shift,id',
                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                   $conductor = new Conductor([
                        'user_id' => $request->user_id,
                        'salary_id' => $request->salary_id,
                        'bus_id' => $request->bus_id,
                        'shift_id' => $request->shift_id,
                        'date_employed' => $request->date_employed,
                   ]);

                   $conductor->saveOrFail();

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$conductor
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

    // Employee
    public function updateEmployee(Request $request)
    {
        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'employee_id' => 'required|exists:employee,id',
                        'shift' => 'required|exists:shift,id',
                        'emp_status' => 'required'
                    ]);

                    $employee = Employee::findorfail($request->employee_id);
                    $employee->shift_id = $request->shift;
                    $employee->employment_status = $request->emp_status;

                    $employee->update();

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$employee
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

    public function registerEmployee(Request $request){

        try{
            DB::beginTransaction();
                    $validator = Validator::make($request->all(), [
                        'user_id' => 'required|exists:users,id',
                        'salary_id' => 'required|exists:salary,id',
                        'shift_id' => 'required|exists:shift,id',
                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                   $employee = new Employee([
                        'user_id' => $request->user_id,
                        'salary_id' => $request->salary_id,
                        'shift_id' => $request->shift_id,
                        'date_employed' => $request->date_employed,
                   ]);

                   $employee->saveOrFail();

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$employee
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

    // Passanger
    public function updatePassanger(Request $request)
    {
        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'passanger_id' => 'required|exists:passanger,id',
                        'fname' => 'required',
                        'lname' => 'required',
                        'sname' => 'required',
                        'username' => 'required',
                        'email' => 'required',
                        'gender' => 'required',
                        'age' => 'required',
                    ]);

                    $passanger = Passanger::findorfail($request->passanger_id);
                    $passanger->fname = $request->fname;
                    $passanger->lname = $request->lname;
                    $passanger->sname = $request->sname;
                    $passanger->username = $request->username;
                    $passanger->email = $request->email;
                    $passanger->gender = $request->gender;
                    $passanger->age = $request->age;

                    $passanger->update();

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$passanger
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
        // Passanger
        public function updateTicket(Request $request)
        {
            try{
                DB::beginTransaction();

                        $validator = Validator::make($request->all(), [
                            'ticket_id' => 'required|exists:ticket,id',
                            'bus_number' => 'required|exists:bus,id',
                            'busroute' => 'required|exists:busroute,id',
                            'amount' => 'required',
                            'status' => 'required',
                        ]);

                        $ticket = Ticket::findorfail($request->ticket_id);
                        $ticket->amount = $request->amount;
                        $ticket->status = $request->status;
                        $ticket->bus_id = $request->bus_number;
                        $ticket->route_id = $request->busroute;


                        $ticket->update();

                        if ($validator->fails()) {
                            $output['tag']=-1;
                            $output['errors']=$validator->errors();
                            return $output;
                        }

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
}

