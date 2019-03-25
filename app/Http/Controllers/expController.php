<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Salary;
use App\Models\UserDamage;
use App\Models\Deduction;


use Illuminate\Support\Facades\DB;


class expController extends Controller
{
    // damages
    public function addDamages(Request $request){

        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'category' => 'required',
                        'd_cost' => 'required',
                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }


                    $user_damage=new Salary([
                        'category'=>$request->category,
                        'costs'=>$request->d_cost,
                    ]);

                    $user_damage->saveOrFail();
                    DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$user_damage
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
    public function updateDamage(Request $request){
        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'damage_id' => 'required|exists:user_damages,id',
                        'utitle' => 'sometimes',
                        'ucosts' => 'sometimes',
                    ]);

                    $deductionDetails = UserDamage::findOrfail($request->damage_id);
                    $damageDetails->category = $request->utitle;
                    $damageDetails->costs = $request->ucosts;

                    $damageDetails->update();

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$damageDetails
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

    // deductions
    public function addDeduction(Request $request){

        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'category' => 'required',
                        'd_cost' => 'required',
                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }


                    $deduct=new Deduction([
                        'category'=>$request->category,
                        'amount'=>$request->d_cost,
                    ]);

                    $deduct->saveOrFail();
                    DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$deduct
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
    public function updateDeductions(Request $request){
        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'deductions_id' => 'required|exists:deductions,id',
                        'utitle' => 'sometimes',
                        'ucosts' => 'sometimes',
                    ]);

                    $deductionDetails = Deduction::find($request->deductions_id);
                    $deductionDetails->category = $request->utitle;
                    $deductionDetails->amount = $request->ucosts;

                    $deductionDetails->update();

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$deductionDetails
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

    // salary
    public function addSal(Request $request){

        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'basic_salary' => 'required',
                        'deduct_id' => 'required|exists:deductions,id',
                        'category' => 'required',
                        'damage_id' => 'required|exists:user_damages,id',
                    ]);

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                    $deduct = Deduction::find($request->deduct_id);
                    $damage = UserDamage::find($request->damage_id);
                    $totalSal =($request->basic_salary + $deduct->amount +$damage->costs);

                    $sal=new Salary([
                        'category'=>$request->category,
                        'basic_salary'=>$request->basic_salary,
                        'deductions_id'=>$request->deduct_id,
                        'user_damages_id'=>$request->damage_id,
                        'total_salary'=>$totalSal
                    ]);

                    $sal->saveOrFail();
                    DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$sal
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
    public function updateSal(Request $request){
        try{
            DB::beginTransaction();

                    $validator = Validator::make($request->all(), [
                        'sal_id' => 'required|exists:salary,id',
                        'utitle' => 'sometimes',
                        'ucosts' => 'sometimes',
                        'damage' => 'sometimes',
                        'deduct' => 'sometimes',
                    ]);

                    $deductionDetails = Deduction::findOrfail($request->deduct);
                    $damageDetails = Salary::findOrfail($request->damage);

                    $sal = Salary::findOrfail($request->sal_id);
                    $sal->category = $request->utitle;
                    $sal->basic_salary = $request->ucosts;
                    $sal->deductions_id = $deductionDetails->id;
                    $sal->user_damages_id = $damageDetails->id;
                    $sal->total_salary = (($request->ucosts)-($deductionDetails->amount+$damageDetails->costs));


                    $sal->update();

                    if ($validator->fails()) {
                        $output['tag']=-1;
                        $output['errors']=$validator->errors();
                        return $output;
                    }

                DB::commit();

            return [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$sal
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


}
