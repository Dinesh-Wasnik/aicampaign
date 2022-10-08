<?php

namespace App\Http\Middleware;

use Closure;

use App\Helper;

class ValidateCampaign
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //check for validity of campaign
        if(!(Helper::checkCampaign('Anniversary_celebration'))){
             return response()->json(['error' => 'No campaign running']);
        }

        return $next($request);
       
    }
}
