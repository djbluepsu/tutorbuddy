<?php

namespace Tutorbuddy\Http\Controllers;
use Auth;

class HomeController extends Controller{

	public function index(){

		if(Auth::check()){
			$tutors = Auth::user()->tutors();
		$tutees = Auth::user()->isTutoring();
		$requestsForYou = Auth::user()->tutorRequests();
		$yourRequests = Auth::user()->tutorRequestsPending();
		

			return view('timeline.index')
			->with('tutors', $tutors)
			->with('tutees', $tutees)
			->with('requestsForYou', $requestsForYou)
			->with('yourRequests', $yourRequests);
		}
		return view('home');
	}
	public function getAbout(){

		return view('about');
	}

}