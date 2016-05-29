<div class= 'media'>
	<a class='pull-left' href='{{ route('profile.index', ['username' => $user->username]) }}'>
		<img class= 'media-object' alt='{{$user->getNameOrUsername()}}' src='{{$user->getAvatarURL()}}'>
	</a>
	<div class= 'media-body'>
		<h4 class= 'media-heading'><a href='{{ route('profile.index', ['username' => $user->username]) }}'>{{ $user->getNameOrUsername()}}</a></h4>
		@if($user->grade)
		<p>Grade: {{$user->grade}}</p>
		@endif
	</div>
</div>