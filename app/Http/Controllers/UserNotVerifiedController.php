<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNotVerifiedController extends Controller
{

    public function pending($username = null)
    {	
    	if (Auth::user()->verificate === '1') {
			return redirect('/');
		}

    	return view('frontend.notverified', compact('username'));
    }
}
