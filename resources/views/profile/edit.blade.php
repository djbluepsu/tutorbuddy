@extends('templates.default')
@section('content')
    
<h3>Update your profile</h3>

<div class="row">
    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="{{ route('profile.edit') }}">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('first_name')? ' has-error': ''}}">
                        <label for="first_name" class="control-label">First name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old('first_name')  ?: Auth::user()->first_name }}">
                        @if ($errors->has('first_name'))
                            <span class= 'help-block'>{{$errors->first('first_name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('last_name')? ' has-error': ''}}">
                        <label for="last_name" class="control-label">Last name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" value="{{ Request::old('last_name')  ?: Auth::user()->last_name }}">
                        @if ($errors->has('last_name'))
                            <span class= 'help-block'>{{$errors->first('last_name')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('grade')? ' has-error': ''}}">
                <label for="grade" class="control-label">Grade</label>
                <input type="number" name="grade" class="form-control" id="grade" value="{{ Request::old('grade') ? Auth::user()->grade : 9 }}" min='9' max='12' step= "1">
                @if ($errors->has('grade'))
                            <span class= 'help-block'>{{$errors->first('grade')}}</span>
                        @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Update</button>
            </div>
            <input type='hidden' name= '_token' value= '{{Session::token()}}'>
        </form>
    </div>
</div>
@stop