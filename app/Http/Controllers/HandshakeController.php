<?php

namespace Tutorbuddy\Http\Controllers;
use Auth;

use Tutorbuddy\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;

class HandshakeController extends Controller{

	public function getSend($username, $class, $time){

		$user = User::where('username', $username)->first();


		if(!Auth::user()->isCurrentlyTutoringInAt($user, $class, $time)){

			return redirect()
			->route('home')
			->with('info', "You are not tutoring that person.");
		}

		Auth::user()->sendHandshake($user, $class, $time);
		return redirect()
		->route('buddies.index')
		->with('info', 'Handshake sent.');



	}

	public function getAccept($username, $class, $time){

		$user= User::where('username', $username)->first();

		if(!Auth::user()->hasReceivedHandshake($user, $class, $time)){

			return redirect()
			->route('home')
			->with('info', "You have not received a handshake from this person.");
		}
		Auth::user()->acceptHandshake($user, $class, $time);
			return redirect()
		->route('buddies.index')
		->with('info', 'Handshake accepted.');

	}

	public function getDecline($username, $class, $time){
			$user= User::where('username', $username)->first();
				if(!Auth::user()->hasReceivedHandshake($user, $class, $time)){

					return redirect()
					->route('home')
					->with('info', "You have not received a handshake from this person.");
		}


			Auth::user()->declineHandshake($user, $class, $time);
				return redirect()
		->route('buddies.index')
		->with('info', 'Handshake declined.');

	}










}