@extends('layouts.backend')
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					{{ __('Change Password') }}
				</div>
				<div class="card-body">
					<form action="{{ route('updatePassword', Auth::user()->id) }}" class="validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<div class="form-group">
							<label class="control-label">{{ __('Old Password') }}</label>
								<input type="password" class="form-control" name="oldPassword" required>
						</div>
						<div class="form-group">
							<label class="control-label">{{ __('New Password') }}</label>
								<input type="password" class="form-control" name="password" required>
						</div>
						<div class="form-group">
							<label class="control-label">{{ __('Confirm Password') }}</label>
								<input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
						</div>
						<div class="modal-footer mt-3">
								<button type="submit" class="btn btn-main">{{ __('Update Password') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

