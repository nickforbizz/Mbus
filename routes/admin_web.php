<?php

        Route::get('/', 'pagesController@welcome')->name('home');
        Route::get('/logout', function (){
            Auth::guard('admin')->logout();
            return redirect("admin");
        })->name('logout');

        Route::get('users/user', 'pagesController@user')->name('users.list');
        Route::get('users/addUser', 'pagesController@addUser');
        Route::get('users/driver', 'pagesController@driver');
        Route::get('users/conductor', 'pagesController@conductor');
        Route::get('users/passanger', 'pagesController@passanger');
        Route::get('users/employee', 'pagesController@employee');
        Route::post('users/registerUser', 'UserController@register' );
        Route::post('users/updateUser', 'UserController@updateUser' );
        // bus
        Route::get('bus/view_bus', 'pagesController@bus');
        Route::get('bus/add', 'pagesController@addBus');
        Route::get('bus/maintenance', 'pagesController@maintenance');
        Route::get('bus/busRoute', 'pagesController@busRoute');

        // Expences
        Route::get('expences/salary', 'pagesController@salary');
        Route::get('expences/user_damages', 'pagesController@user_damages');
        Route::get('expences/deductions', 'pagesController@deductions');

        // Trip
        Route::get('trip/', 'pagesController@trip');

        // Tickets
        Route::get('ticket/', 'pagesController@ticket');

        //  _GET data with {{ id }}
        Route::get('/getMaintenance/{id}', function( $id){
            $maintain = \App\Models\Maintenance::find($id);
            return $maintain;
        });

        Route::get('/getDamage/{id}', function( $id){
            $damage = \App\Models\UserDamage::find($id);
            return $damage;
        });
        Route::get('/getdeductions/{id}', function( $id){
            $deduct = \App\Models\Deduction::find($id);
            return $deduct;
        });
        Route::get('/getBusroute/{id}', function( $id){
            $busroute = \App\Models\Busroute::find($id);
            return $busroute;
        });
        Route::get('/getSalary/{id}', function( $id){

            $sal = \App\Models\Salary::find($id);
            $col=collect($sal)
                ->put("deductions",$sal->deduction)
                ->put("damages",$sal->userDamage);

            // $sal = \App\Models\Salary::all();//find($id);
            // $col=collect($sal)->map(function( \App\Models\Salary $item){
            //     $data=collect($item)
            //         ->put('deductions',$item->deduction);
            //     return $data;
            // });
            return $col;
        });
        Route::get('/getDriver/{id}', function( $id){

            $driver = \App\Models\Driver::find($id);
            $col=collect($driver)
                ->put("Salary",$driver->deduction)
                ->put("User",$driver->user)
                ->put("Bus",$driver->bus)
                ->put("Shift",$driver->shift);
            return $col;
        });
        Route::get('/getConductor/{id}', function( $id){

            $conductor = \App\Models\Conductor::find($id);
            $col=collect($conductor)
                ->put("Salary",$conductor->deduction)
                ->put("User",$conductor->user)
                ->put("Bus",$conductor->bus)
                ->put("Shift",$conductor->shift);
            return $col;
        });
        Route::get('/getEmployee/{id}', function( $id){

            $emp = \App\Models\Employee::find($id);
            $col=collect($emp)
                ->put("Salary",$emp->deduction)
                ->put("User",$emp->user)
                ->put("Shift",$emp->shift);
            return $col;
        });
        Route::get('/getPassanger/{id}', function( $id){

            $passanger = \App\Models\Passanger::find($id);
            $col=collect($passanger)
                ->put("Contact",$passanger->contact);
            return $col;
        });
        Route::get('/getTrip/{id}', function( $id){

            $trip = \App\Models\Trip::find($id);
            $col=collect($trip)
                ->put("Bus",$trip->bus)
                ->put("Busroute",$trip->route)
                ->put("Driver",$trip->driver)
                ->put("Conductor",$trip->conductor);
            return $col;
        });
        Route::get('/getTicket/{id}', function( $id){

            $ticket = \App\Models\Ticket::find($id);

            $col=collect($ticket)
                ->put("Bus",$ticket->bus)
                ->put("Busroute",$ticket->Busroute);
            return $ticket;
        });



        // _POST //
        // _______________Bus______________________________________________________
        Route::post('/addMaintenance', 'BusController@addMaintenance');
        Route::post('/addBusroute', 'BusController@addBusroute');
        Route::post('/updateMaintenance', 'BusController@updateMaintenance');
        Route::post('/updateBusroute', 'BusController@updateBusroute');
        Route::post('/updateBus', 'BusController@updateBus' );
        Route::post('/registerBus', 'BusController@register' );

        // ____________Expences____________________________________________________
        Route::post('/updateDamage', 'expController@updateDamage');
        Route::post('/updateDeductions', 'expController@updateDeductions');
        Route::post('/updateSal', 'expController@updateSal');
        Route::post('/addSal', 'expController@addSal');
        Route::post('exp', 'expController@addDamages');
        Route::post('exp_deduction', 'expController@addDeduction');

        //___________________Users__________________________________________________
        // >>> Driver
        Route::post('registerConductor', 'UserController@registerConductor');
        Route::post('updateConductor', 'UserController@updateConductor');
        // >>> Conductor
        Route::post('registerDriver', 'UserController@registerDriver');
        Route::post('updaterDriver', 'UserController@updaterDriver');
        // >>> Employee
        Route::post('registerEmployee', 'UserController@registerEmployee');
        Route::post('updateEmployee', 'UserController@updateEmployee');
        // >>> Passanger
        Route::post('updatePassanger', 'UserController@updatePassanger');
        // Route::post('registerEmployee', 'UserController@registerEmployee');

        // Ticket
        Route::post('updateTicket', 'UserController@updateTicket');





        // ____________________Pages with id Get___________________________________
        Route::get('users/assignRole/{user_id}', 'pagesController@assignRole');
        Route::get('bus/edit/{bus_id}', 'pagesController@editBus');



?>
