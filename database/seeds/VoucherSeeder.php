<?php

use Illuminate\Database\Seeder;
use App\Voucher;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 1000 vouchers 
        factory(Voucher::class, 1000)->create();
    }
}
