@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="card">
			<div class="card-header">
					{{ __('Edit Profile') }}
			</div>
			<div class="card-body">
					<form action="{{ route("profile.update", Auth::user()->id ) }}" class="form-horizontal validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<div class="row">
							<label class="col-sm-3 control-label">{{ __('Name') }}</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" value="{{$profile->name}}" required>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-3 control-label">{{ __('Email') }}</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="email" value="{{ $profile->email }}" required>
							</div>
						</div>
						<div class="row mb-2">
							<label class="col-sm-3 control-label">{{ __('Image') }}</label>
							<div class="col-sm-9">
								<input type="file" class="form-control dropify" data-default-file="{{ asset('public/uploads/images/'.$profile->image) }}" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
							</div>
						</div>
						
						<div class="row">
							<label class="col-sm-3 control-label">{{ __('Facebook Link') }}</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="facebook" value="{{ $profile->facebook }}">
							</div>
						</div>
						
						<div class="row">
							<label class="col-sm-3 control-label">{{ __('Twitter Link') }}</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="twitter" value="{{ $profile->twitter }}">
							</div>
						</div>
						
						<div class="row">
							<label class="col-sm-3 control-label">{{ __('Linkedin Link') }}</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="linkedin" value="{{ $profile->linkedin }}">
							</div>
						</div>
						
						<div class="row">
							<label class="col-sm-3 control-label">{{ __('Google Plus Link') }}</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="google_plus" value="{{ $profile->google_plus }}">
							</div>
						</div>

						<div class="row">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-info">{{ __('Update Profile') }}</button>
							</div>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>
@endsection

