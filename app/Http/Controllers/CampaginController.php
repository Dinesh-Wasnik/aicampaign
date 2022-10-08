<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Voucher;
use App\Helper;
use Carbon\Carbon;

class CampaginController extends Controller
{   
    // validate request
    public function __construct(Request $request){
        $this->middleware('ValidateCampaign');
    }

    //check the eligibility of users
    public function eligibilityCheck(Request $request){

        $userId = request()->user()->id;

        //check user eligibility
        $check = Transaction::eligibilityCheck($userId);

        //chekc if user already redeem voucher or not 
        if(!(Voucher::redeemed($userId)))
        {
            Voucher::assign($userId);

            return response()->json(['status' => 'pass']);
        }

        return response()->json(['status' => 'fail']);  
    }
   

    //validate the pic and return voucher code.
    public function validateSubmission(Request $request){

        $userId = request()->user()->id;

        //call image  recongnition api
        $status = Helper::imageRecongnition();

        //get user locked vocher data.
        $voucher = Voucher::getVoucherById($userId);

        $currentTime = Carbon::now();
        $diff =  $currentTime->diffInMinutes($voucher->lock_at);

        //if validate image and in time upload
        if($status == 1 && $diff <= 10){

            //update voucher information
            $voucher->assign_at = Carbon::now(); 
            $voucher->is_lock   = 1; 
            $voucher->save();

            //return voucher code 
            return response()->json(['voucer_code ' => $voucher->code]);
        }

        //if invalidate image or  time limit exceed
        if($status == 0 || $diff >= 10){

            //update voucher information
            $voucher->lock_at   = null; 
            $voucher->assign_to = null; 
            $voucher->save();

            //return voucher code 
            return response()->json(['status ' => 'Time limit exceed or image is not correct']);
        }

    }
}