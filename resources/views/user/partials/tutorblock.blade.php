<div class= 'media'>

	<a class='pull-left' href='{{ route('profile.index', ['username' => $user->username]) }}'>
		<img class= 'media-object' alt='{{$user->getNameOrUsername()}}' src='{{$user->getAvatarURL()}}'>
	</a>
	<div class= 'media-body'>
		<div class= "col-lg-5">
		<h4 class= 'media-heading'><a href='{{ route('profile.index', ['username' => $user->username]) }}'>{{ $user->getNameOrUsername()}}</a></h4>
		@if($user->grade)
		<p>Grade: {{$user->grade}}</p>
		@endif
		</div>
	
	<div class= 'col-lg-7'>
		<form class="" action="{{ route('buddies.add', ['username' => $user->username, 'class' => $class]) }}"> 
			<label>Select a time:</label>
					<select class="c-select" name="time_select">
							<option selected disabled hidden>Select one of the following times: </option>
							@if($user->monday_after)
							<option value= 'Monday 3:15-4:15'>Monday 3:15-4:15</option>
							@endif
							@if($user->tuesday_after)
							<option value= 'Tuesday 3:15-4:15'>Tuesday 3:15-4:15</option>
							@endif
							@if($user->wednesday_after)
							<option value= 'Wednesday 3:15-4:15'>Wednesday 3:15-4:15</option>
							@endif
							@if($user->thursday_after)
							<option value= 'Thursday 3:15-4:15'>Thursday 3:15-4:15</option>
							@endif
							@if($user->friday_after)
							<option value= 'Friday 3:15-4:15'>Friday 3:15-4:15</option>
							@endif
							@if($user->free_a1)
							<option value= 'A1 Free'>A1 Free</option>
							@endif
							@if($user->free_a2)
							<option value= 'A2 Free'>A2 Free</option>
							@endif
							@if($user->free_a3)
							<option value= 'A3 Free'>A3 Free</option>
							@endif
							@if($user->free_a4)
							<option value= 'A4 Free'>A4 Free</option>
							@endif
							@if($user->free_b1)
							<option value= 'B1 Free'>B1 Free</option>
							@endif
							@if($user->free_b2)
							<option value= 'B2 Free'>B2 Free</option>
							@endif
							@if($user->free_b3)
							<option value= 'B3 Free'>B3 Free</option>
							@endif
							@if($user->free_b4)
							<option value= 'B4 Free'>B4 Free</option>
							@endif
							</select>
					
			<div class="form-group">
                <button type="submit" class="btn btn-primary">Add Tutor</button>
            </div>
            <input type='hidden' name= '_token' value= '{{Session::token()}}'>


		</form>
	</div>
	</div>

</div>