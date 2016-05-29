@extends('templates.default')
@section('content')
	
<div class="row">
    <div class="col-lg-6">
        <h3>Your tutors</h3>

      @if (!$tutors->count())
				<p>You have no active tutors.</p>
			@else
				@foreach ($tutors as $request)
				@include ('request/partials/yourtutorblock')
			  @endforeach
			@endif
    </div>

    <div class="col-lg-6">
        <h3>Your tutees</h3>

      @if (!$tutees->count())
        <p>You have no active tutees.</p>
      @else
        @foreach ($tutees as $request)
        @include ('request/partials/tuteeblock')
        @endforeach
      @endif
    </div>
    
</div>
@stop