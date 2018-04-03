<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function search(Request $request)
	{
		if(!isset($request->address) || $request->address == ""){

		}else{
			return view('search-result');
		}
	}
	public function doctorPublieProfile()
	{
		return view('profile');
	}
}
