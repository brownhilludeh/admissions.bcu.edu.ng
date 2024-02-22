<form action="{{ route('password.update', Auth::user()->id) }}" class="bp-submit validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<div class="row">
							<label class="col-sm-3 control-label">{{ __('Old Password') }}</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="oldPassword" required>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-3 control-label">{{ __('New Password') }}</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password" required>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-3 control-label">{{ __('Confirm Password') }}</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
							</div>
						</div>
						<div class="modal-footer">
								<button type="submit" class="btn btn__main">{{ __('Update Password') }}</button>
						</div>
					</form>