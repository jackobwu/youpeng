<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::where(function($query){
        //     return $query->where('user_id', Auth::id());
        // })
        // ->latest()
        // ->paginate(20);
        
        // return view('timeline')->with(compact('statuses'));
        // if(Auth::check()){
		// 	$statuses = Status::whereNull('parent_id')->where(function($query){
		// 		return $query->where('user_id', Auth::id())
		// 			->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
		// 	})
		// 	->latest()
		// 	->paginate(20);
			
		// 	return view('timeline')->with(compact('statuses'));
		// }

		return view('home');

    }
}
