<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username){
			$user = User::where('name', $username)->firstOrFail();

			$statuses = $user->statuses()->whereNull('parent_id')->latest()->get();

			return view('profile.index')->with(compact('user', 'statuses'));
    }
    
    public function getEdit(){
			return view('profile.edit');
	}
}
