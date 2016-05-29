<?php

namespace Tutorbuddy\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class User extends Model implements AuthenticatableContract
{
   use Authenticatable;

   protected $table= 'users';
    
    protected $fillable = [
        'username', 
        'email', 
        'password',
        'first_name',
        'last_name',
        'grade',
        'num_slots', 
        'hoursTutored',
        'mathHours',
        'scienceHours',
        'languageHours',
        'englishHours',
        'artsHours',
        'historyHours',
        'monday_after',
        'tuesday_after',
        'wednesday_after',
        'thursday_after',
        'friday_after',
        'free_a1',
        'free_a2',
        'free_a3',
        'free_a4',
        'free_b1',
        'free_b2',
        'free_b3',
        'free_b4',
        'alg1_a',
        'alg1_b',
        'alg1',
        'geometry',
        'alg2trig', 
        'FST', 
        'accel_Math_1',
        'accel_Math_2',
        'precalc',
        'discrete_math',
        'AP_stats', 
        'AP_calc_AB', 
        'AP_calc_BC',
        'biology',
        'mo_bio',
        'biotech',
        'env_sci', 
        'forensic_sci', 
        'marine_bio',
        'anatomy',
        'zoology',
        'APES',
        'AP_Bio', 
        'physical_sci', 
        'chem',
        'xl_chem',
        'AP_chem',
        'physics',
        'earth_sci', 
        'eng_sci', 
        'AP_physics_1',
        'AP_physics_2',
        'AP_physics_c',
        'a_goode_class',
        'AP_studio_art_drawing', 
        'AP_studio_art_2D', 
        'AP_studio_art_3D',
        'AP_art_history',
        'AP_music_theory',
        'spanish_nov',
        'french_nov', 
        'chinese_nov', 
        'spanish_i_1',
        'spanish_i_2',
        'spanish_i_3',
        'chinese_i_1',
        'chinese_i_2', 
        'chinese_i_3', 
        'french_i_1',
        'french_i_2',
        'french_i_3',
        'spanish_ih_1',
        'spanish_ih_2', 
        'spanish_ih_3', 
        'chinese_ih_1',
        'chinese_ih_2',
        'chinese_ih_3',
        'french_ih_1',
        'french_ih_2',
        'french_ih_3',
        'spanish_adv',
        'french_adv',
        'AP_spanish',
        'AP_chinese',
        'AP_french',
        'chinese_nn',
        'AP_chinese_nn',
        'AT_chinese_history',
        'japanese_4',
        'whistory',
        'ushistory',
        'apush',
        'apeuro',
        'apworld',
        'aphumangeo',
        'apusgov',
        'apcompgov',
        'econ',
        'apecon',
        'psych',
        'appsych',
        'eng9',
        'eng10',
        'aplang',
        'aplit',
        'amstudies',
        'wstudies',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function getName(){
        if($this->first_name && $this->last_name){
            return "{$this->first_name} {$this->last_name}";

        }
        if ($this->first_name)
            return $this->first_name;
            return null;
    }

    public function getNameOrUsername(){

        return $this->getName() ?: $this->username;
    }

    public function getFirstNameOrUsername(){

        return $this->first_name ?: $this->username;
    }

    public function getAvatarURL(){

        return "http://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
    }

    public function tutorsOfMine(){
        return $this->belongsToMany('Tutorbuddy\Models\User', 'tutors', 'tutee_id', 'tutor_id')->withPivot('class', 'time', 'subject', 'tutor_id', 'tutee_id');

    }
    public function tutorOf(){

        return $this-> belongsToMany('Tutorbuddy\Models\User', 'tutors', 'tutor_id', 'tutee_id')->withPivot('class', 'time', 'subject', 'tutor_id', 'tutee_id');
    }

    public function tutors(){

        return $this
        ->tutorsOfMine()
        ->wherePivot('accepted', true)
        ->wherePivot('declined', false)
        ->get();
    }

    public function isTutoring(){

         return $this
         ->tutorOf()
         ->wherePivot('accepted', true)
         ->wherePivot('declined', false)
         ->get();
    }


    public function tutorRequests(){

        return $this
        ->tutorOf()
        ->wherePivot('accepted', false)
        ->wherePivot('declined', false)
        ->get();

    }


public function hasTutorRequestReceived(User $user, $class, $time){
    return $this
        ->tutorOf()
        ->wherePivot('accepted', false)
        ->wherePivot('declined', false)
        ->wherePivot('tutee_id', $user->id)
        ->wherePivot('class', $class)
        ->wherePivot('time', $time)
        ->exists();

}
public function hasTutorRequestReceivedFrom(User $user){

     return $this
        ->tutorOf()
        ->wherePivot('accepted', false)
        ->wherePivot('declined', false)
        ->wherePivot('tutee_id', $user->id)
        ->exists();

    }

    public function tutorRequestsPending(){

        return $this
        ->tutorsOfMine()
        ->wherePivot('accepted', false)
        ->wherePivot('declined', false)
        ->get();

    }

    public function hasTutorRequestPending(User $user, $class){

        return (bool) $this
        ->tutorsOfMine()
        ->wherePivot('accepted', false)
        ->wherePivot('declined', false)
        ->wherePivot('tutor_id', $user->id)
        ->wherePivot('class', $class)
        ->count();
    }
public function hasTutorRequestPendingFrom(User $user){

        return (bool) $this
        ->tutorsOfMine()
        ->wherePivot('accepted', false)
        ->wherePivot('declined', false)
        ->wherePivot('tutor_id', $user->id)
        ->count();
    }


public function addTutor(User $user, $class, $time){

    $this->tutorsOfMine()->attach($user->id, [
        'class' => $class,
        'subject' => $this->getSubjectnum($class),
        'time' => $time,
        ]);
}

public function takeBackRequest(User $user, $class, $time){

   $this
    ->tutorsOfMine()
    ->wherePivot('accepted', false)
    ->wherePivot('declined', false)
    ->wherePivot('tutor_id', $user->id)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->first()
    ->pivot
    ->update([
            'declined' => true,
        ]);
    
}

public function deleteTutor(User $user, $class, $time){

   $this
    ->tutorsOfMine()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('tutor_id', $user->id)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->first()
    ->pivot
    ->update([
            'declined' => true,
        ]);
    $user->openTime($time);
}

public function deleteTutee(User $user, $class, $time){
    $this
    ->tutorOf()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('tutee_id', $user->id)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->first()
    ->pivot
    ->update([
            'declined' => true,
        ]);

$this->openTime($time);

}

public function closeTime($time){
    $this->update([
        'numSlots' => $this->numSlots - 1,
        ]);
    if($time == "Monday 3:15-4:15")
        $this->update([
            'monday_after' => false,
            ]);
    if($time == "Tuesday 3:15-4:15")
        $this->update([
            'tuesday_after' => false,
            ]);
    if($time == "Wednesday 3:15-4:15")
        $this->update([
            'wednesday_after' => false,
            ]);
    if($time == "Thursday 3:15-4:15")
        $this->update([
            'thursday_after' => false,
            ]);
    if($time == "Friday 3:15-4:15")
        $this->update([
            'friday_after' => false,
            ]);
    if($time == "A1 Free")
        $this->update([
            'free_a1' => false,
            ]);
    if($time == "A2 Free")
        $this->update([
            'free_a2' => false,
            ]);
    if($time == "A3 Free")
        $this->update([
            'free_a3' => false,
            ]);
    if($time == "A4 Free")
        $this->update([
            'free_a4' => false,
            ]);
    if($time == "B1 Free")
        $this->update([
            'free_b1' => false,
            ]);
    if($time == "B2 Free")
        $this->update([
            'free_b2' => false,
            ]);
    if($time == "B3 Free")
        $this->update([
            'free_b3' => false,
            ]);
    if($time == "B4 Free")
        $this->update([
            'free_b4' => false,
            ]);


}
public function openTime($time){
    $this->update([
        'numSlots' => $this->numSlots + 1,
        ]);
    if($time == "Monday 3:15-4:15")
        $this->update([
            'monday_after' => true,
            ]);
    if($time == "Tuesday 3:15-4:15")
        $this->update([
            'tuesday_after' => true,
            ]);
    if($time == "Wednesday 3:15-4:15")
        $this->update([
            'wednesday_after' => true,
            ]);
    if($time == "Thursday 3:15-4:15")
        $this->update([
            'thursday_after' => true,
            ]);
    if($time == "Friday 3:15-4:15")
        $this->update([
            'friday_after' => true,
            ]);
    if($time == "A1 Free")
        $this->update([
            'free_a1' => true,
            ]);
    if($time == "A2 Free")
        $this->update([
            'free_a2' => true,
            ]);
    if($time == "A3 Free")
        $this->update([
            'free_a3' => true,
            ]);
    if($time == "A4 Free")
        $this->update([
            'free_a4' => true,
            ]);
    if($time == "B1 Free")
        $this->update([
            'free_b1' => true,
            ]);
    if($time == "B2 Free")
        $this->update([
            'free_b2' => true,
            ]);
    if($time == "B3 Free")
        $this->update([
            'free_b3' => true,
            ]);
    if($time == "B4 Free")
        $this->update([
            'free_b4' => true,
            ]);


}
public function acceptTutorRequest(User $user, $class, $time){

    $this
    ->tutorOf()
    ->wherePivot('accepted', false)
    ->wherePivot('declined', false)
    ->wherePivot('tutee_id', $user->id)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->first()
    ->pivot
    ->update([
            'accepted' => true,
        ]);

    $user->closeTime($time);

}
public function declineTutorRequest(User $user, $class, $time){

    $this
    ->tutorOf()
    ->wherePivot('accepted', false)
    ->wherePivot('declined', false)
    ->wherePivot('tutee_id', $user->id)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->first()
    ->pivot
    ->update([
            'declined' => true,
        ]);
}


public function isBeingTutoredByIn(User $user, $class)
{
    return (bool) $this
    ->tutorsOfMine()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('tutor_id', $user->id)
    ->wherePivot('class', $class)
    ->count();
}
public function isBeingTutoredByInAt(User $user, $class, $time)
{
    return (bool) $this
    ->tutorsOfMine()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('tutor_id', $user->id)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->count();
}

public function isBeingTutoredBy(User $user)
{
    return (bool) $this
    ->tutorsOfMine()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('tutor_id', $user->id)
    ->count();
}
public function isBeingTutoredIn($class)
{
    return (bool) $this
    ->tutorsOfMine()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('tutee_id', $this->id)
    ->wherePivot('class', $class)
    ->count();
}



public function isCurrentlyTutoring(User $user)
{
    return (bool) $this
    ->tutorOf()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('tutee_id', $user->id)
    ->count();
}

public function isCurrentlyTutoringIn(User $user, $class)
{
    return (bool) $this
    ->tutorOf()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('tutee_id', $user->id)
    ->wherePivot('class', $class)
    ->count();
}

public function isCurrentlyTutoringInAt(User $user, $class, $time)
{
    return (bool) $this
    ->tutorOf()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('tutee_id', $user->id)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->count();
}

public function hasSentTutorRequestToInAt(User $user, $class, $time)
{
    return (bool) $this
    ->tutorsOfMine()
    ->wherePivot('accepted', false)
    ->wherePivot('declined', false)
    ->wherePivot('tutor_id', $user->id)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->count();
}

public function hasSentClassRequest($class){

    return (bool) $this
    ->tutorsOfMine()
    ->wherePivot('accepted', false)
    ->wherePivot('declined', false)
    ->wherePivot('class', $class)
    ->count();

}


public function hasReceivedHandshake(User $user, $class, $time){
    return (bool) $this
    ->tutorsOfMine()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->wherePivot('tutor_id', $user->id)
    ->wherePivot('handshakeSent', true)
    ->count();
}

public function hasAlreadySentHandshake(User $user, $class, $time){
        return (bool) $this
    ->tutorOf()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->wherePivot('tutee_id', $user->id)
    ->wherePivot('handshakeSent', true)
    ->count();


}


public function sendHandshake(User $user, $class, $time){
    $this
    ->tutorOf()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->wherePivot('tutee_id', $user->id)
    ->first()
    ->pivot
    ->update([
            'handshakeSent' => true,
        ]);
}

public function incrementHours(User $user, $class){
    $user->update([
        'hoursTutored' => $user->hoursTutored + 1,
        ]);
    if($this->getSubjectnum($class) == 1)
            $user->update([
                'mathHours' => $user->mathHours + 1,
                ]);
        
    if($this->getSubjectnum($class) == 2)
        $user->update([
                'scienceHours' => $user->scienceHours + 1,
                ]);
    if($this->getSubjectnum($class) == 3)
        $user->update([
                'artsHours' => $user->artsHours + 1,
                ]);
    if($this->getSubjectnum($class) == 4)
        $user->update([
                'languageHours' => $user->languageHours + 1,
                ]);
    if($this->getSubjectnum($class) == 5)
        $user->update([
                'historyHours' => $user->historyHours + 1,
                ]);
    if($this->getSubjectnum($class) == 6)
        $user->update([
                'englishHours' => $user->englishHours + 1,
                ]);

}

public function acceptHandshake(User $user, $class, $time){
 
     $this
    ->tutorsOfMine()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->wherePivot('tutor_id', $user->id)
    ->wherePivot('handshakeSent', true)
    ->first()
    ->pivot
    ->update([
            'handshakeSent' => false,
        ]);

$this->incrementHours($user, $class);

}

public function declineHandshake(User $user, $class, $time){
        
        $this
    ->tutorsOfMine()
    ->wherePivot('accepted', true)
    ->wherePivot('declined', false)
    ->wherePivot('class', $class)
    ->wherePivot('time', $time)
    ->wherePivot('tutor_id', $user->id)
    ->wherePivot('handshakeSent', true)
    ->first()
    ->pivot
    ->update([
            'handshakeSent' => false,
        ]);

}



public function getSubjectnum($class){
        if($class == 'alg1_a' || $class ==
       'alg1' || $class == "Algebra 1A" || $class == 'alg1_b'|| $class ==
        'geometry' || $class ==
        'alg2trig'|| $class ==
        'FST' || $class ==
        'accel_Math_1' || $class ==
        'accel_Math_2' || $class ==
        'precalc' || $class ==
        'discrete_math' || $class ==
        'AP_stats' || $class ==
        'AP_calc_AB' || $class == 
        'AP_calc_BC')
            return 1;
if($class == 'biology' || $class ==
        'mo_bio' || $class ==
        'biotech' || $class ==
        'env_sci' || $class ==
        'forensic_sci' || $class ==
        'marine_bio' || $class ==
        'anatomy' || $class ==
        'zoology' || $class ==
        'APES' || $class ==
        'AP_Bio' || $class ==
        'physical_sci' || $class ==
        'chem' || $class ==
        'xl_chem' || $class ==
        'AP_chem' || $class ==
        'physics' || $class ==
        'earth_sci' || $class ==  
        'eng_sci' || $class ==
        'AP_physics_1' || $class ==
        'AP_physics_2' || $class ==
        'AP_physics_c' || $class ==
        'a_goode_class')
    return 2;
if ($class ==    'AP_studio_art_drawing' || $class ==
        'AP_studio_art_2D' || $class ==
        'AP_studio_art_3D' || $class ==
        'AP_art_history' || $class ==
        'AP_music_theory')
        return 3;
         if($class ==
        'spanish_nov' || $class ==
        'french_nov' || $class ==
        'chinese_nov' || $class ==
        'spanish_i_1' || $class ==
        'spanish_i_2' || $class ==
        'spanish_i_3' || $class ==
        'chinese_i_1' || $class ==
        'chinese_i_2' || $class ==
        'chinese_i_3' || $class ==
        'french_i_1' || $class ==
        'french_i_2' || $class ==
        'french_i_3' || $class ==
        'spanish_ih_1' || $class ==
        'spanish_ih_2' || $class ==
        'spanish_ih_3' || $class ==
        'chinese_ih_1' || $class ==
        'chinese_ih_2' || $class ==
        'chinese_ih_3' || $class ==
        'french_ih_1' || $class ==
        'french_ih_2' || $class ==
        'french_ih_3' || $class ==
        'spanish_adv' || $class ==
        'french_adv' || $class ==
        'AP_spanish' || $class ==
        'AP_chinese' || $class ==
        'AP_french' || $class ==
        'chinese_nn' || $class ==
        'AP_chinese_nn' || $class ==
        'AT_chinese_history' || $class ==
        'japanese_4')
            return 4;
            if($class ==
        'whistory' || $class ==
        'ushistory' || $class ==
        'apush' || $class ==
        'apeuro'|| $class ==
        'apworld' || $class ==
        'aphumangeo' || $class ==
        'apusgov' || $class ==
        'apcompgov' || $class ==
        'econ' || $class ==
        'apecon' || $class ==
        'psych' || $class ==
        'appsych')
                return 5;
         if($class =="eng9" || $class == "wstudies" || $class =="eng10" || $class =="amstudies" || $class =="aplang" || $class =="aplit")
            return 6;
        return null;

    }

public function convertClass($class){
    if($class == 'alg1_a')
        return "Algebra 1A";
    if($class == 'alg1_b')
        return "Algebra 1B";
    if($class == 'alg1')
        return "Algebra 1";
    if($class == 'geometry')
        return "Geometry";
    if($class == 'alg2trig')
        return "Algebra 2/Trigonometry";
    if($class == 'FST')
        return "Functions, Stats, and Trig";
    if($class == 'accel_Math_1')
        return "Accelerated Math 1";
    if($class == 'accel_Math_2')
        return "Accelerated Math 2";
    if($class == 'precalc')
        return "Precalculus";
    if($class == 'discrete_math')
        return "Discrete Math";
    if($class == 'AP_stats')
        return "AP Statistics";
    if($class == 'AP_calc_AB')
        return "AP Calculus AB";
    if($class == 'AP_calc_BC')
        return "AP Calculus BC";
    if($class == 'biology')
        return "Biology";
    if($class == 'mo_bio')
        return "Molecular Biology";
    if($class == 'biotech')
        return "Biotech";
    if($class == 'env_sci')
        return "Environmental Science";
    if($class == 'forensic_sci')
        return "Forensic Science";
    if($class == 'marine_bio')
        return "Marine Biology";
    if($class == 'anatomy')
        return "Anatomy";
    if($class == 'zoology')
        return "Zoology";
    if($class == 'APES')
        return "AP Environmental Science";
    if($class == 'AP_Bio')
        return "AP Biology";
    if($class == 'physical_sci')
        return "Physical Science";
    if($class == 'chem')
        return "Chemistry";
    if($class == 'xl_chem')
        return "Accelerated Chemistry";
    if($class == 'AP_chem')
        return "AP Chemistry";
    if($class == 'physics')
        return "Physics";
    if($class == 'earth_sci')
        return "Earth Science";
    if($class == 'eng_sci')
        return "Engineering Science";
    if($class == 'AP_physics_1')
        return "AP Physics 1";
    if($class == 'AP_physics_2')
        return "AP Physics 2";
    if($class == 'AP_physics_c')
        return "AP Physics C";
    if($class == 'a_goode_class')
        return "AP Computer Science";
    if($class == 'AP_studio_art_drawing')
        return "AP Studio Art: Drawing";
    if($class == 'AP_studio_art_2D')
        return "AP Studio Art: 2D";
    if($class == 'AP_studio_art_3D')
        return "AP Studio Art: 3D";
    if($class == 'AP_art_history')
        return "AP Art History";
    if($class == 'AP_music_theory')
        return "AP Music Theory";
    if($class == 'spanish_nov')
        return "Spanish Novice";
    if($class == 'french_nov')
        return "French Novice";
    if($class == 'chinese_nov')
        return "Chinese Novice";
    if($class == 'spanish_i_1')
        return "Spanish Intermediate 1";
    if($class == 'spanish_i_2')
        return "Spanish Intermediate 2";
    if($class == 'spanish_i_3')
        return "Spanish Intermediate 3";
    if($class == 'chinese_i_1')
        return "Chinese Intermediate 1";
    if($class == 'chinese_i_2')
        return "Chinese Intermediate 2";
    if($class == 'chinese_i_3')
        return "Chinese Intermediate 3";
    if($class == 'french_i_1')
        return "French Intermediate 1";
    if($class == 'french_i_2')
        return "French Intermediate 2";
    if($class == 'french_i_3')
        return "French Intermediate 3";
    if($class == 'spanish_ih_1')
        return "Spanish Intermediate High 1";
    if($class == 'spanish_ih_2')
        return "Spanish Intermediate High 2";
    if($class == 'spanish_ih_3')
        return "Spanish Intermediate High 3";
    if($class == 'chinese_ih_1')
        return "Chinese Intermediate High 1";
    if($class == 'chinese_ih_2')
        return "Chinese Intermediate High 2";
    if($class == 'chinese_ih_3')
        return "Chinese Intermediate High 3";
    if($class == 'french_ih_1')
        return "French Intermediate High 1";
    if($class == 'french_ih_2')
        return "French Intermediate High 2";
    if($class == 'french_ih_3')
        return "French Intermediate High 3";
    if($class == 'spanish_adv')
        return "Spanish Advanced";
    if($class == 'french_adv')
        return "French Advanced";
    if($class == 'AP_spanish')
        return "AP Spanish";
    if($class == 'AP_chinese')
        return "AP Chinese";
    if($class == 'AP_french')
        return "AP French";
    if($class == 'chinese_nn')
        return "Chinese Near Native";
    if($class == 'AP_chinese_nn')
        return "AP Chinese Near Native";
    if($class == 'AT_chinese_history')
        return "AT Chinese History";
    if($class == 'japanese_4')
        return "Japanese 4";
    if($class == 'whistory')
        return "World History";
    if($class == 'ushistory')
        return "US History";
    if($class == 'apush')
        return "AP US History";
    if($class == 'apeuro')
        return "AP European History";
    if($class == 'apworld')
        return "AP World History";
    if($class == 'aphumangeo')
        return "AP Human Geography";
    if($class == 'apusgov')
        return "AP US Government";
    if($class == 'apcompgov')
        return "AP Comparative Government";
    if($class == 'econ')
        return "Economics";
    if($class == 'apecon')
        return "AP Economics";
    if($class == 'psych')
        return "Pyschology";
    if($class == 'appsych')
        return "AP Psychology";
    if($class == 'eng9')
        return "English 9";
    if($class == 'eng10')
        return "English 10";
    if($class == 'aplang')
        return "AP Language and Composition";
    if($class == 'aplit')
        return "AP Literature";
    if($class == 'amstudies')
        return "American Studies";
    if($class == 'wstudies')
        return "World Studies";
     
    return $class;
}
public function getFrees(){
        $times= '';
        if($this->free_a1)
            $times.="A1, ";
        if($this->free_a2)
            $times.="A2, ";
        if($this->free_a3)
            $times.="A3, ";
        if($this->free_a4)
            $times.="A4, ";
        if($this->free_b1)
            $times.="B1, ";
        if($this->free_b2)
            $times.="B2, ";
        if($this->free_b3)
            $times.="B3, ";
        if($this->free_b4)
            $times.="B4, ";
        if(strlen($times)>1)
        return substr($times, 0, -2);
        return $times;
    }

     public function getDays(){
        $days= '';
        if($this->monday_after)
            $times.="Monday, ";
        if($this->tuesday_after)
            $times.="Tuesday, ";
        if($this->wednesday_after)
            $times.="Wednesday, ";
        if($this->thursday_after)
            $times.="Thursday, ";
        if($this->friday_after)
            $times.="Friday, ";
        if(strlen($days)>1)
        return substr($days, 0, -2);
        return $days;
    }

    public function getSubjects(){
        $subjects= '';
        if($class == 'alg1_a')
        return "Algebra 1A";
    if($class == 'alg1_b')
        return "Algebra 1B";
    if($class == 'alg1')
        return "Algebra 1";
    if($class == 'geometry')
        return "Geometry";
    if($class == 'alg2trig')
        return "Algebra 2/Trigonometry";
    if($class == 'FST')
        return "Functions, Stats, and Trig";
    if($class == 'accel_Math_1')
        return "Accelerated Math 1";
    if($class == 'accel_Math_2')
        return "Accelerated Math 2";
    if($class == 'precalc')
        return "Precalculus";
    if($class == 'discrete_math')
        return "Discrete Math";
    if($class == 'AP_stats')
        return "AP Statistics";
    if($class == 'AP_calc_AB')
        return "AP Calculus AB";
    if($class == 'AP_calc_BC')
        return "AP Calculus BC";
    if($class == 'biology')
        return "Biology";
    if($class == 'mo_bio')
        return "Molecular Biology";
    if($class == 'biotech')
        return "Biotech";
    if($class == 'env_sci')
        return "Environmental Science";
    if($class == 'forensic_sci')
        return "Forensic Science";
    if($class == 'marine_bio')
        return "Marine Biology";
    if($class == 'anatomy')
        return "Anatomy";
    if($class == 'zoology')
        return "Zoology";
    if($class == 'APES')
        return "AP Environmental Science";
    if($class == 'AP_Bio')
        return "AP Biology";
    if($class == 'physical_sci')
        return "Physical Science";
    if($class == 'chem')
        return "Chemistry";
    if($class == 'xl_chem')
        return "Accelerated Chemistry";
    if($class == 'AP_chem')
        return "AP Chemistry";
    if($class == 'physics')
        return "Physics";
    if($class == 'earth_sci')
        return "Earth Science";
    if($class == 'eng_sci')
        return "Engineering Science";
    if($class == 'AP_physics_1')
        return "AP Physics 1";
    if($class == 'AP_physics_2')
        return "AP Physics 2";
    if($class == 'AP_physics_c')
        return "AP Physics C";
    if($class == 'a_goode_class')
        return "AP Computer Science";
    if($class == 'AP_studio_art_drawing')
        return "AP Studio Art: Drawing";
    if($class == 'AP_studio_art_2D')
        return "AP Studio Art: 2D";
    if($class == 'AP_studio_art_3D')
        return "AP Studio Art: 3D";
    if($class == 'AP_art_history')
        return "AP Art History";
    if($class == 'AP_music_theory')
        return "AP Music Theory";
    if($class == 'spanish_nov')
        return "Spanish Novice";
    if($class == 'french_nov')
        return "French Novice";
    if($class == 'chinese_nov')
        return "Chinese Novice";
    if($class == 'spanish_i_1')
        return "Spanish Intermediate 1";
    if($class == 'spanish_i_2')
        return "Spanish Intermediate 2";
    if($class == 'spanish_i_3')
        return "Spanish Intermediate 3";
    if($class == 'chinese_i_1')
        return "Chinese Intermediate 1";
    if($class == 'chinese_i_2')
        return "Chinese Intermediate 2";
    if($class == 'chinese_i_3')
        return "Chinese Intermediate 3";
    if($class == 'french_i_1')
        return "French Intermediate 1";
    if($class == 'french_i_2')
        return "French Intermediate 2";
    if($class == 'french_i_3')
        return "French Intermediate 3";
    if($class == 'spanish_ih_1')
        return "Spanish Intermediate High 1";
    if($class == 'spanish_ih_2')
        return "Spanish Intermediate High 2";
    if($class == 'spanish_ih_3')
        return "Spanish Intermediate High 3";
    if($class == 'chinese_ih_1')
        return "Chinese Intermediate High 1";
    if($class == 'chinese_ih_2')
        return "Chinese Intermediate High 2";
    if($class == 'chinese_ih_3')
        return "Chinese Intermediate High 3";
    if($class == 'french_ih_1')
        return "French Intermediate High 1";
    if($class == 'french_ih_2')
        return "French Intermediate High 2";
    if($class == 'french_ih_3')
        return "French Intermediate High 3";
    if($class == 'spanish_adv')
        return "Spanish Advanced";
    if($class == 'french_adv')
        return "French Advanced";
    if($class == 'AP_spanish')
        return "AP Spanish";
    if($class == 'AP_chinese')
        return "AP Chinese";
    if($class == 'AP_french')
        return "AP French";
    if($class == 'chinese_nn')
        return "Chinese Near Native";
    if($class == 'AP_chinese_nn')
        return "AP Chinese Near Native";
    if($class == 'AT_chinese_history')
        return "AT Chinese History";
    if($class == 'japanese_4')
        return "Japanese 4";
    if($class == 'whistory')
        return "World History";
    if($class == 'ushistory')
        return "US History";
    if($class == 'apush')
        return "AP US History";
    if($class == 'apeuro')
        return "AP European History";
    if($class == 'apworld')
        return "AP World History";
    if($class == 'aphumangeo')
        return "AP Human Geography";
    if($class == 'apusgov')
        return "AP US Government";
    if($class == 'apcompgov')
        return "AP Comparative Government";
    if($class == 'econ')
        return "Economics";
    if($class == 'apecon')
        return "AP Economics";
    if($class == 'psych')
        return "Pyschology";
    if($class == 'appsych')
        return "AP Psychology";
    if($class == 'eng9')
        return "English 9";
    if($class == 'eng10')
        return "English 10";
    if($class == 'aplang')
        return "AP Language and Composition";
    if($class == 'aplit')
        return "AP Literature";
    if($class == 'amstudies')
        return "American Studies";
    if($class == 'wstudies')
        return "World Studies";
     
    return $class;


    }

}
