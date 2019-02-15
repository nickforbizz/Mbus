<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\BillController;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BillTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {


        try{
            DB::beginTransaction();
            $bC=new BillController();
            $bC->createBill($name,$amount);
            $this->assertTrue(true);

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            echo json_encode($exception->getMessage());

            $this->assertTrue(false);

        }
    }
}
