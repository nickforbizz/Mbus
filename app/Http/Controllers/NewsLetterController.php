<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Mail;
    use Validator;
    use \App\Models\Newsletter;
    use \App\Mail\mailtrap;




class NewsLetterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.pages.contact');
    }


    public function store(Request $request)
    {

        try{
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'email'=>'required|email'
            ]);

            if ($validator->fails()) {
                $output['tag']=-1;
                $output['errors']=$validator->errors();
                return $output;
            }



            $newsletter = new Newsletter([
                'email'=>$request->email
            ]);
            $data = array([
                'email' => $request->email
            ]);
            $newsletter->saveOrFail();

            Mail::to($newsletter->email)->sendNow(new UserRegistered($data));
//            Mail::to($user->email)->send(new UserRegistered())
            DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$newsletter
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

