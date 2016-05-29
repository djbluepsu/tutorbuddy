@extends('templates.default')
@section('content')
	<h3>Your results for "{{Auth::user()->convertClass(Request::input('class_select'))}}"</h3>

	@if(!$users->count())
		<p>There were no tutors found, sorry.</p>
	@elseif($users->count() === 1)
	@foreach($users as $user)
	@if($user->id === Auth::user()->id)
	<p>There were no tutors found.</p>
	@endif
	@endforeach
@endif
	<div class='row'>
		<div class= 'col-lg-12'>

			@foreach($users as $user)
			@if($user->id !== Auth::user()->id)
			@include('user/partials/tutorblock')
			@endif
			@endforeach
		</div>


	</div>

@stop