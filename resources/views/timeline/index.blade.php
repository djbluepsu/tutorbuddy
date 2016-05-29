@extends('templates.default')

@section('content')


<div>
<div class= "col-lg-6 text-center border"><h3>Your requests</h3>
	@if(!$yourRequests->count())
	<p>You have not requested any tutors.</p>
	@else
	@foreach($yourRequests as $request)
	@include('request.partials.requestblock')
	@endforeach
	@endif
</div>
<div class= "col-lg-6 text-center border"><h3>Tutor requests</h3>
	@if(!$requestsForYou->count())
	<p>You have not received any tutor requests.</p>
	@else
	@foreach($requestsForYou as $request)
	@include('request.partials.requestForYouBlock')
	@endforeach
	@endif
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class= "footer">
<div class= "col-lg-6 text-center btn btn-default btn-info pull-down"><a href="{{route('tutor.register')}}"><h3>Sign up to be a tutor here!</h3></a></div>
<div class= "col-lg-6 text-center btn btn-default btn-warning pull-down"><a href="{{route('tutor.get')}}"><h3>Get tutors!</h3></a></div>
</div>
<br>
<br>
<h6><a class= "btn btn-default pull-down" href="{{route('home.about')}}">About</a></h6>

@stop