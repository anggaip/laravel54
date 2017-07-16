<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class BukalapakController extends Controller
{
    public function index() 
    {
    	$result = shell_exec('curl -u 4760101:2evk6IjnQGQ1tzIo8Dom https://api.bukalapak.com/v2/users/info.json');
        $js = "<script>console.log(".$result.")</script>";
        return $js;
    }

    public function auth(Request $request)
    {
    	$username = $request->username;
        $password = $request->password;

        $result = shell_exec('curl -u '.$username.':'.$password.' https://api.bukalapak.com/v2/authenticate.json'.' -X POST');
        return $result;
    }
}
