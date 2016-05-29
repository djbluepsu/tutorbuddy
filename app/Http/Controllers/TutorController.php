<?php

namespace Tutorbuddy\Http\Controllers;


use Auth;
use Tutorbuddy\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;



class TutorController extends Controller{
	public function getRegister(){
		return view('tutors.registration');

	}
	public function postRegister(Request $request){
		
		Auth::user()->update([
			'num_slots'=> $request->input('num_slots'),
			'hoursTutored'=> $request->input('hoursTutored'),
			'monday_after'=> $request->input('monday_after'),
			'tuesday_after'=> $request->input('tuesday_after'),
			'wednesday_after'=> $request->input('wednesday_after'),
			'thursday_after'=> $request->input('thursday_after'),
			'friday_after'=> $request->input('friday_after'),
			'free_a1'=> $request->input('free_a1'),
			'free_a2'=> $request->input('free_a2'),
			'free_a3'=> $request->input('free_a3'),
			'free_a4'=> $request->input('free_a4'),
			'free_b1'=> $request->input('free_b1'),
			'free_b2'=> $request->input('free_b2'),
			'free_b3'=> $request->input('free_b3'),
			'free_b4'=> $request->input('free_b4'),
			'alg1_a'=> $request->input('alg1_a'),
			'alg1_b'=> $request->input('alg1_b'),
			'alg1'=> $request->input('alg1'),
			'geometry'=> $request->input('geometry'),
			'alg2trig'=> $request->input('alg2trig'),
			'FST'=> $request->input('FST'),
			'accel_Math_1'=> $request->input('accel_Math_1'),
			'accel_Math_2'=> $request->input('accel_Math_2'),
			'precalc'=> $request->input('precalc'),
			'discrete_math'=> $request->input('discrete_math'),
			'AP_stats'=> $request->input('AP_stats'),
			'AP_calc_AB'=> $request->input('AP_calc_AB'),
			'AP_calc_BC'=> $request->input('AP_calc_BC'),
			'biology'=> $request->input('biology'),
			'mo_bio'=> $request->input('mo_bio'),
			'biotech'=> $request->input('biotech'),
			'env_sci'=> $request->input('env_sci'),
			'forensic_sci'=> $request->input('forensic_sci'),
			'marine_bio'=> $request->input('marine_bio'),
			'anatomy'=> $request->input('anatomy'),
			'zoology'=> $request->input('zoology'),
			'APES'=> $request->input('APES'),
			'AP_Bio'=> $request->input('AP_Bio'),
			'physical_sci'=> $request->input('physical_sci'),
			'chem'=> $request->input('chem'),
			'xl_chem'=> $request->input('xl_chem'),
			'AP_chem'=> $request->input('AP_chem'),
			'physics'=> $request->input('physics'),
			'earth_sci'=> $request->input('earth_sci'),
			'eng_sci'=> $request->input('eng_sci'),
			'AP_physics_1'=> $request->input('AP_physics_1'),
			'AP_physics_2'=> $request->input('AP_physics_2'),
			'AP_physics_c'=> $request->input('AP_physics_c'),
			'a_goode_class'=> $request->input('a_goode_class'),
			'AP_studio_art_drawing'=> $request->input('AP_studio_art_drawing'),
			'AP_studio_art_2D'=> $request->input('AP_studio_art_2D'),
			'AP_studio_art_3D'=> $request->input('AP_studio_art_3D'),
			'AP_art_history'=> $request->input('AP_art_history'),
			'AP_music_theory'=> $request->input('AP_music_theory'),
			'spanish_nov'=> $request->input('spanish_nov'),
			'french_nov'=> $request->input('french_nov'),
			'chinese_nov'=> $request->input('chinese_nov'),
			'spanish_i_1'=> $request->input('spanish_i_1'),
			'spanish_i_2'=> $request->input('spanish_i_3'),
			'chinese_i_1'=> $request->input('chinese_i_1'),
			'chinese_i_2'=> $request->input('chinese_i_2'),
			'chinese_i_3'=> $request->input('chinese_i_3'),
			'french_i_1'=> $request->input('french_i_1'),
			'french_i_2'=> $request->input('french_i_2'),
			'french_i_3'=> $request->input('french_i_3'),
			'spanish_ih_1'=> $request->input('spanish_ih_1'),
			'spanish_ih_2'=> $request->input('spanish_ih_2'),
			'spanish_ih_3'=> $request->input('spanish_ih_3'),
			'chinese_ih_1'=> $request->input('chinese_ih_1'),
			'chinese_ih_2'=> $request->input('chinese_ih_2'),
			'chinese_ih_3'=> $request->input('chinese_ih_3'),
			'french_ih_1'=> $request->input('french_ih_1'),
			'french_ih_2'=> $request->input('french_ih_2'),
			'french_ih_3'=> $request->input('french_ih_3'),
			'spanish_adv'=> $request->input('spanish_adv'),
			'french_adv'=> $request->input('french_adv'),
			'AP_spanish'=> $request->input('AP_spanish'),
			'AP_chinese'=> $request->input('AP_chinese'),
			'AP_french'=> $request->input('AP_french'),
			'chinese_nn'=> $request->input('chinese_nn'),
			'AP_chinese_nn'=> $request->input('AP_chinese_nn'),
			'AT_chinese_history'=> $request->input('AT_chinese_history'),
			'japanese_4'=> $request->input('japanese_4'),
			'whistory'=> $request->input('whistory'),
			'ushistory'=> $request->input('ushistory'),
			'apush'=> $request->input('apush'),
			'apeuro'=> $request->input('apeuro'),
			'apworld'=> $request->input('apworld'),
			'aphumangeo'=> $request->input('aphumangeo'),
			'apusgov'=> $request->input('apusgov'),
			'apcompgov'=> $request->input('apcompgov'),
			'econ'=> $request->input('econ'),
			'apecon'=> $request->input('apecon'),
			'psych'=> $request->input('psych'),
			'appsych'=> $request->input('appsych'),
			'eng9'=> $request->input('eng9'),
			'eng10'=> $request->input('eng10'),
			'aplang'=> $request->input('aplang'),
			'aplit'=> $request->input('aplit'),
			'amstudies'=> $request->input('amstudies'),
			'wstudies'=> $request->input('wstudies'),
			
			]);

		return redirect()
		->route('home')
		->with('info', 'Thanks for registering!');
		

	}

	public function getTutors(){
		return view('tutors.get');

	}

	public function findTutors(Request $request){
		$this->validate($request, [
			'class_select' => 'required',
			]);

		$class= $request->input('class_select');


		$a1 = $request->input('free_a1');
		$a2 = $request->input('free_a2');
		$a3 = $request->input('free_a3');
		$a4 = $request->input('free_a4');
		$b1 = $request->input('free_b1');
		$b2 = $request->input('free_b2');
		$b3 = $request->input('free_b3');
		$b4 = $request->input('free_b4');
		$monday= $request->input('monday_after');
		$tuesday= $request->input('tuesday_after');
		$wednesday= $request->input('wednesay_after');
		$thursday= $request->input('thursday_after');
		$friday= $request->input('friday_after');

		if (is_null($a1)&&is_null($a2)&&is_null($a3)&&is_null($a4)&&is_null($b1)&&is_null($b2)&&is_null($b3)&&is_null($b4)&&is_null($monday)&&is_null($tuesday)&&is_null($wednesday)&&is_null($thursday)&&is_null($friday)) {
			return view('tutors.get');
		}

		$users = User::where("{$class}", 1)
		->where('free_a1',1);

		if ($a1 == 1) {
			$a1q= User::where("{$class}", 1)
		->where('free_a1',1);
		$users = $users->union($a1q);
		}
		if ($a2 == 1) {
			$a2q= User::where("{$class}", 1)
		->where('free_a2',1);
		$users = $users->union($a2q);
		}
		if ($a3 == 1) {
			$a3q= User::where("{$class}", 1)
		->where('free_a3',1);
		$users = $users->union($a3q);
		}
		if ($a4 == 1) {
			$a4q= User::where("{$class}", 1)
		->where('free_a4',1);
		$users = $users->union($a4q);
		}
		if ($b1 == 1) {
			$b1q= User::where("{$class}", 1)
		->where('free_b1',1);
		$users = $users->union($b1q);
		}
		if ($b2 == 1) {
			$b2q= User::where("{$class}", 1)
		->where('free_b2',1);
		$users = $users->union($b2q);
		}
		if ($b3 == 1) {
			$b3q= User::where("{$class}", 1)
		->where('free_b3',1);
		$users = $users->union($b3q);
		}
		if ($b4 == 1) {
			$b4q= User::where("{$class}", 1)
		->where('free_b4',1);
		$users = $users->union($b4q);
		}
		if ($monday == 1) {
			$mondayq= User::where("{$class}", 1)
		->where('monday_after',1);
		$users = $users->union($mondayq);
		}
		if ($tuesday == 1) {
			$tuesdayq= User::where("{$class}", 1)
		->where('tuesday_after',1);
		$users = $users->union($tuesdayq);
		}
		if ($wednesday == 1) {
			$wednesdayq= User::where("{$class}", 1)
		->where('wednesday_after',1);
		$users = $users->union($wednesdayq);
		}
		if ($thursday == 1) {
			$thursdayq= User::where("{$class}", 1)
		->where('thursday_after',1);
		$users = $users->union($thursdayq);
		}
		if ($friday == 1) {
			$fridayq= User::where("{$class}", 1)
		->where('friday_after',1);
		$users = $users->union($fridayq);
		}

		$users = $users->orderBy('hoursTutored', 'asc')->get();


		return view('tutors.results')
		->with('class', $class)
		->with('users', $users);


	}
public function getIndex(){


		$tutors = Auth::user()->tutors();
		$tutees = Auth::user()->isTutoring();
		$requestsForYou = Auth::user()->tutorRequests();
		$yourRequests = Auth::user()->tutorRequestsPending();


		return view('buddies.index')
		->with('tutors', $tutors)
		->with('tutees', $tutees)
		->with('requestsForYou', $requestsForYou)
		->with('yourRequests', $yourRequests);
	}


	public function getAdd(Request $request, $username, $class){

		$this->validate($request, [
			'time_select' => 'required',
			]);
		$time = $request->input('time_select');

		$user= User::where('username', $username)->first();

		if(!$user){

			return redirect()
			->route('home')
			->with('info', 'That user could not be found.');
		}
		if($user->id === Auth::user()->id){

			return redirect()->route('home');
		}

		if(Auth::user()->hasTutorRequestPending($user, $class)){
			return redirect()
			->route('profile.index', ['username'=>$user->username])
			->with('info', 'Tutor request already pending.');
		}

		if (Auth::user()->isBeingTutoredIn($class)){
			return redirect()
			->route('profile.index', ['username' => $user->username])
			->with('info', 'You are already being tutored in this class.');

		}

		if(Auth::user()->hasSentClassRequest($class)){
			return redirect()
			->route('home')
			->with('info', 'You already sent a tutor request for this class.');
		}
		

		
		Auth::user()->addTutor($user, $class, $time);
		return redirect()
		->route('profile.index', ['username'=> $user->username])
		->with('info', 'Tutor request sent.');

}

	public function getAccept($username, $class, $time){
		
		$user= User::where('username', $username)->first();

		if(!$user){

			return redirect()
			->route('home')
			->with('info', 'That user could not be found.');
		}

		if(!Auth::user()->hasTutorRequestReceived($user, $class, $time)){
			
				return redirect()->route('home');
		}

		Auth::user()->acceptTutorRequest($user, $class, $time);

		return redirect()
		->route('profile.index', ['username' => $username])
		->with('info', 'Tutor request accepted.');

	}

	public function getDecline($username, $class, $time){
		
		$user= User::where('username', $username)->first();

		if(!$user){

			return redirect()
			->route('home')
			->with('info', 'That user could not be found.');
		}

		if(!Auth::user()->hasTutorRequestReceived($user, $class, $time)){

				return redirect()->route('home');
		}

		Auth::user()->declineTutorRequest($user, $class, $time);
		return redirect()
		->route('profile.index', ['username' => $username])
		->with('info', 'Tutor request denied.');

	}

public function getDeleteTutor($username, $class, $time){
		$user= User::where('username', $username)->first();

		if(!$user){

			return redirect()
			->route('home')
			->with('info', 'That user could not be found.');
		}

		if(!Auth::user()->isBeingTutoredByInAt($user, $class, $time)){

				return redirect()
				->route('home');
		}

		Auth::user()->deleteTutor($user, $class, $time);
		return redirect()
		->route('profile.index', ['username' => $username])
		->with('info', 'Tutor deleted.');

}

public function getDeleteTutee($username, $class, $time){
		$user= User::where('username', $username)->first();

		if(!$user){

			return redirect()
			->route('home')
			->with('info', 'That user could not be found.');
		}

		if(!Auth::user()->isCurrentlyTutoringInAt($user, $class, $time)){

				return redirect()->route('home');
		}

		Auth::user()->deleteTutee($user, $class, $time);
		return redirect()
		->route('profile.index', ['username' => $username])
		->with('info', 'Tutor deleted.');

}
public function getTakeBackRequest($username, $class, $time){
		$user= User::where('username', $username)->first();
		if(!$user){

			return redirect()
			->route('home')
			->with('info', 'That user could not be found.');
		}

		if(!Auth::user()->hasSentTutorRequestToInAt($user, $class, $time)){

				return redirect()->route('home');
		}

		Auth::user()->takeBackRequest($user, $class, $time);
		$tutors = Auth::user()->tutors();
		$tutees = Auth::user()->isTutoring();
		$requestsForYou = Auth::user()->tutorRequests();
		$yourRequests = Auth::user()->tutorRequestsPending();
		

			return view('timeline.index')
			->with('tutors', $tutors)
			->with('tutees', $tutees)
			->with('requestsForYou', $requestsForYou)
			->with('yourRequests', $yourRequests)
			->with('info', 'Request deleted.');

}
}

