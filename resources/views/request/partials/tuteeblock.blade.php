<div class= 'media'>
	<a class='pull-left' href='{{ route('profile.index', ['username' => $request->username]) }}'>
		<img class= 'media-object' alt='{{$request->getNameOrUsername()}}' src='{{$request->getAvatarURL()}}'>
	</a>
	<div class= 'media-body'>
		<h4 class= 'media-heading'><a href='{{ route('profile.index', ['username' => $request->username]) }}'>{{ $request->getNameOrUsername()}}</a></h4>
		@if($request->grade)
		<p>Grade: {{$request->grade}}</p>
		@endif
		<p>Class: {{Auth::user()->convertClass($request->pivot->class)}}</p>
		<p>Time: {{$request->pivot->time}}</p>
		@if(!Auth::user()->hasAlreadySentHandshake($request, $request->pivot->class, $request->pivot->time)) 
		<a href="{{route('handshake.send', ['username' => $request->username, 'class' => $request->pivot->class, 'time' => $request->pivot->time])}}" class= "btn btn-default">Send Handshake</a>
		@else
		<p>Handshake already sent.</p>
		@endif
		<a href="{{route('buddies.deletetutee', ['username' => $request->username, 'class' => $request->pivot->class, 'time' => $request->pivot->time])}}" class= 'btn btn-warning'>Delete tutee</a>
	</div>

</div>