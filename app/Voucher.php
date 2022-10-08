<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Voucher extends Model
{
    
    // This function check if user reddemed any of 
    // voucher, if redeemed then campaign link will
    // not work.
    // @param integer $userID 
    // @return true|false
    public static function redeemed(int $userId) : bool 
    {
        $count  = self::Where('assign_to', $userId)->count();

        if($count > 0)
        {
            return true;
        }

        return false;    
    }//end


    // lock the vocher for 10 min
    // not work.
    // @param integer $userID 
    public static function assign(int $userId)
    {   
        //first select voucher
        $voucher = self::select('id', 'code')->where('is_lock', 0)
                            ->whereNull('assign_to')->lockForUpdate()->first();

        $voucher->assign_to = $userId;
        $voucher->lock_at   = Carbon::now();

        //update the voucher
        $voucher->save();
    }



    // Get the voucher by userid
    // @param integer $userID
    public static function getVoucherById(int $userId)
    {
        return self::select('id', 'code', 'lock_at')->where('assign_to', $userId)->first();
    }

}
