<?php

namespace App;

use  Carbon\Carbon;


class Helpers
{   

    // This function check the campaigin is active or not,
    // Also this help to disapper or denied access of link
    // if active return true otherwise false.
    public static function checkCampaign($campaign='Anniversary_celebration')
    {
        
        //check if current date is in campaign date ranage
        if(Carbon::now() >= config('campaign.'.$campaign.'.start')
         && Carbon::now()<= config('campaign.'.$campaign.'.end'))
        {

            return true;
        }

        return false;

    }//end


}

