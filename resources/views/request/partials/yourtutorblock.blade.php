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
		@if(Auth::user()->hasReceivedHandshake($request, $request->pivot->class, $request->pivot->time))
		<a href="{{route('handshake.accept', ['username' => $request->username, 'class' => $request->pivot->class, 'time' => $request->pivot->time])}}" class= "btn btn-default">Accept Handshake</a>
		<a href="{{route('handshake.decline', ['username' => $request->username, 'class' => $request->pivot->class, 'time' => $request->pivot->time])}}" class= "btn btn-default">Decline Handshake</a>
		@endif
		<a href="{{route('buddies.deletetutor', ['username' => $request->username, 'class' => $request->pivot->class, 'time' => $request->pivot->time])}}" class= 'btn btn-warning'>Delete tutor</a>
	</div>

</div>