<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transaction::class, 5)->create([
            'user_id' => 1
        ]);
        factory(Transaction::class, 4)->create([
            'user_id' => 2
        ]);
        factory(Transaction::class, 2)->create([
            'user_id' => 3
        ]);        
    }
}
