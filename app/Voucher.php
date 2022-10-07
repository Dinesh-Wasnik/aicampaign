<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
