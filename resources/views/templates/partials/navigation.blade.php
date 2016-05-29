<nav class= 'navbar navbar-default' role= 'navigation'>
	<div class= 'container'>
			<div class= 'navbar-header'>
				<a class= 'navbar-brand' href="{{route('home')}}"><img src="https://drive.google.com/uc?id=0B8mUiRU4nDSOTEdZYkJsMG4xUUk" height="30" width="30" align = "middle"></a>
			</div>
			<div class='collapse navbar-collapse'>
				@if (Auth::check())
				<ul class='nav navbar-nav'>
					<li><a href='{{route('home')}}'>Dashboard</a></li>
					<li><a href='{{route('buddies.index')}}'>Buddies</a></li>
				</ul>
				<form class= 'navbar-form navbar-left' role= 'search' action="{{ route('search.results') }}">
					<div class='form-group'>
							<input type='text' name='query' class='form-control' placeholder= 'Find a buddy'>
					</div>
					<button type='submit' class='btn btn-default'>Search</button>
				</form>
				@endif
				<ul class='nav navbar-nav navbar-right'>
					@if (Auth::check())
					<li><a href='{{ route('profile.index', ['username'=> Auth::user()->username])  }}'>{{Auth::user()->getNameOrUsername()}}</a></li>
					<li><a href='{{ route('profile.edit') }}'>Update profile</a></li>
					<li><a href='{{route('auth.signout')}}'>Sign out</a></li>
				@else
					<li><a href='{{ route('auth.signup') }}'>Sign up</a></li>
					<li><a href='{{ route('auth.signin') }}'>Sign in</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>






