<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{   

    // This function check eligibility of customer,
    // @param integer $userId
    // @return boolean true|false
    public static function eligibilityCheck(int $userId) : bool
    {
        $date = Carbon::today()->subDays(30);

        //fetch transaction
        $transaction = self::select('total_spent')
            ->where('user_id', $userId)
            ->where('created_at','>=',$date)->get();  

        $totalRecord  = $transaction->count();
        $totalSpent   = $transaction->sum('total_spent');   
        
        if ($totalRecord >= 3 &&  $totalSpent >= 100 ) 
        {
            return true;
        } 

        return false;    

    }//end
}
