<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Contact;

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







    // public function changeStatus($request){
    //     $userDetails = User::find($request->user_id); 

    //     $userDetails->contact_id->mobile_number = $request->mobile_number;
    //     $userDetails->contact_id->telephone_number = $request->telephone_number;
    //     $userDetails->contact_id->address = $request->address;
                    
    //     $userDetails->national_id = $request->national_id;
    //     $userDetails->username = $request->username;
    //     $userDetails->email = $request->email;
    //     $userDetails->fname = $request->fname;
    //     $userDetails->lname = $request->lname;
    //     $userDetails->sname = $request->sname;
    //     $userDetails->password = $request->password;
    //     $userDetails->age = $request->age;
    //     $userDetails->gender = $request->gender;
    //     $userDetails->occupation = $request->occupation;
    //     $userDetails->marital_status = $request->marital_status;
    //     $userDetails->updated_at = $request->updated_at;

    //     return $userDetails;
 
                        
    // }
}

