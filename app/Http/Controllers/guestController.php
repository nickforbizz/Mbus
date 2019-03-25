<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Tableguest;


class guestController extends Controller
{
    //
    public function register(Request $request)
    {
        # code...
        try{
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'mobile_number' => 'required',
            ]);

            if ($validator->fails()) {
                $output['tag']=-1;
                $output['errors']=$validator->errors();
                return $output;
            }

            $webuser =new Tableguest([
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'fname'=>$request->fname,
                'lname'=>$request->lname,
                'gender'=>$request->gender,
                'age'=>$request->age,
                'mobile'=>$request->mobile_number,
                'address'=>$request->address,

            ]);

            $webuser->saveOrFail();

            DB::commit();

            auth()->login($webuser);
            return redirect('/home');
            // return [
            //     "code"=>"0",
            //     "message"=>"Success",
            //     "data"=>$webuser
            // ];
            return back('/login');
        } catch (\Exeption $e) {
            DB::rollBack();
                report($e);

                return [
                    "code"=>"-1",
                    "message"=>$e->getMessage()
                ];
        }
    }
    // login user
    public function login(Request $request)
    {
        # code...
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                $output['tag']=-1;
                $output['errors']=$validator->errors();
                return $output;
            }
        //    if(!auth()->attempt(request(['email', 'password']))){
        //         return back()->withErrors([
        //             'message'=>'something went wrong'
        //         ]);
        //    }
        $tableguest = Tableguest::where('email', $request->email);
        if (!$tableguest) {
            return back()->with([
                'message'=>'No such login combinations in the DB'
            ]);
        }
        return redirect('/');
        DB::commit();
        } catch (\Exeption $e) {
            DB::rollback();
            report($e);

            return [
                "code"=>"-1",
                "message"=>$e->getMessage()
            ];
        }
    }
}
