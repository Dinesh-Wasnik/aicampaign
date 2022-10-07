<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LoginController extends Controller
{

    public function __construct()
    {
        //
    }


    //login user and return token
    public function login(Request $request)
    { 
        try {

            $client = new Client();
            $res = $client->request('POST', env('OAUTH_TOKEN_URL'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => $request->client_id,
                    'client_secret' => $request->client_secret,
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope'   => '*'
                ]    
            ]);
        } catch (Exception $e) {

            return  $e->getMessage();
        }


        return json_decode((string) $res->getBody(), true);
    }    
}
