<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(){
		$keyword = request('keyword');
		
		if(!$keyword){
			return redirect()->route('home');
		}

		$users = User::Where('name', 'LIKE', "%{$keyword}%")
			->get();

		return view('results')->with(compact('users', 'keyword'));
	}
}
