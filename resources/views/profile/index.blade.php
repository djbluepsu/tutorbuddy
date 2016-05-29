@extends('templates.default')


@section('content')
			
	<div class= 'row'>
		<div class= 'col-lg-5'>
		@include('user.partials.userblock')
		<hr>

		</div>
		<div class= 'col-lg-4 col-lg-offset-3'>
			@if (Auth::user()->hasTutorRequestPendingFrom($user) && Auth::user()->id !== $user->id)
					<p>Waiting for {{$user->getNameOrUsername()}} to accept your request.</p>

			@elseif(Auth::user()->hasTutorRequestReceivedFrom($user) && Auth::user()->id !== $user->id)
				<a href="" class= 'btn btn-primary'>Accept tutor request</a>

			@elseif(Auth::user()->isCurrentlyTutoring($user) && Auth::user()->id !== $user->id)
				<p>You are currently tutoring {{ $user->getNameOrUsername()}}.</p>	
			@elseif(Auth::user()->isBeingTutoredBy($user) && Auth::user()->id !== $user->id)
				<p>You are being tutored by {{ $user->getNameOrUsername()}} </p>
			@elseif(Auth::user()->id !== $user->id)
				<p>Want to get to know {{ $user->getNameOrUsername()}}? {{ $user->getNameOrUsername()}} can tutor in ...fill in subjects here. </p>

			@endif

			@if(Auth::user()->isCurrentlyTutoring($user) && Auth::user()->id !== $user->id || Auth::user()->isBeingTutoredBy($user) && Auth::user()->id !== $user->id)
			
			@endif
		
			
			
		</div>
		<div>
			<table>
				<tr>
					<td>Total Hours Tutored: </td>
					<td> {{Auth::user()->hoursTutored}}</td>
				</tr>
				<tr>
					<td>Math Hours: </td>
					<td> {{Auth::user()->mathHours}}</td>

				</tr>
				<tr>
					<td>Science Hours: </td>
					<td> {{Auth::user()->scienceHours}}</td>
				</tr>
				<tr>
					<td>English Hours: </td>
					<td> {{Auth::user()->englishHours}}</td>
				</tr>
				<tr>
					<td>Language Hours: </td>
					<td> {{Auth::user()->languageHours}}</td>
				</tr>
				<tr>
					<td>History Hours: </td>
					<td> {{Auth::user()->historyHours}}</td>
				</tr>
				<tr>
					<td>Arts Hours: </td>
					<td> {{Auth::user()->artsHours}}</td>
				</tr>








			</table>






		</div>

	</div>



@stop