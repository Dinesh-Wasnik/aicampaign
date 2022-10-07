<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\validateCampaign;
use App\Transaction;

class CampaginController extends Controller
{   
    // validate request
    public function __construct(){
        $this->middleware('validateCampaign');
    }

    //check the eligibility of users
    public function eligibilityCheck(Request $request){
        dd($request->all());
        return Transaction::eligibilityCheck($request->user_id);  
    }
   

    //validate the pic and return voucher code .
    public function validateSubmission(Request $request){
        Transaction::eligibilityCheck($request->user_id);  
    }
}