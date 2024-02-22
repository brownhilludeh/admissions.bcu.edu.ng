@extends('layouts.backend')
@section('title', 'My Profile')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12  mb-2">
			<div class="row mb-2">
				<div class="col-12">
					<ul class="nav nav-tabs profile-tab">
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#myProfile" aria-selected="true">{{ __('my Profile') }}</a></li>
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#password" aria-selected="true">{{ __('password') }}</a></li>
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#application" aria-selected="true">{{ __('application') }}</a></li>
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#documents" aria-selected="true">{{ __('documents') }}</a></li>
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#passport" aria-selected="truue">{{ __('passport') }}</a></li>
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#email" aria-selected="true">{{ __('Email SMTP') }}</a></li>
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#sms" aria-selected="true">{{ __('SMS') }}</a></li>
					</ul>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-12">
					<div class="tab-content">
						{{-- pprofile --}}
						<div id="myProfile" class="tab-pane fade show">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<div class="card">
										<div class="card-header">
											{{__('Profile')}}
										</div>
										<div class="card-body">
											<table class="table table-bordered table-striped" width="100%">
												<tbody style="text-align: center;">
													<tr class="text-center">
														<td colspan="2"><img src="{{ asset('storage/uploads/images/'.$profile->image) }}" style="width: 100px; border-radius: 5px"></td>
													</tr>
													<tr class="text-center">
														<td>{{ __('Name') }}</td>
														<td>{{ $profile->name }}</td>
													</tr>
													<tr class="text-center">
														<td>{{ __('User Type') }}</td>
														<td>{{ $profile->user_type }}</td>
													</tr>
													<tr class="text-center">
														<td>{{ __('Email') }}</td>
														<td>{{ $profile->email }}</td>
													</tr>
													<tr class="text-center">
														<td>{{ __('Status') }}</td>
														<td>
															@if ($profile->status == 1 )
															<span class="text-success">Active</span>
															@elseif ($profile->status == 2)
															<span class="text-warning">Pending</span>
															@else
															<span class="text-danger">Inactive</span>
															@endif
														</td>
													</tr>
													<tr class="text-center">
														<td>{{ __('Password') }}</td>
														<td>
															@if ($profile->email == true )
															<a href="{{ route('password.request') }}" class="text-orange btn btn-orange">Reset Password link</a>
															@else
															<a href="{{ route('profile.update') }}" class="text-orange btn btn-orange">Link an email address</a>
															@endif
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						{{-- Password --}}
						<div id="password" class="tab-pane fade ">
							<div class="row justify-content-center">
								<div class="col-md-8">
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
						</div>

						{{-- application --}}
						<div id="application" class="tab-pane fade ">
							<div class="row justify-content-center">
								<div class="col-12">
									<div class="card">
										<div class="card-header">{{ __('Application Form') }}</div>
										<div class="card-body">
											<form method="post" class="bp-submit validate" autocomplete="on" action="{{ url('general_settings') }}" enctype="multipart/form-data">
												@csrf
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">{{ __('School Name') }}</label>
														<input type="text" class="form-control" name="school_name" value="{{ get_option('school_name') }}" required>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">{{ __('Site Title') }}</label>
														<input type="text" class="form-control" name="site_title" value="{{ get_option('site_title') }}" required>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">{{ __('Phone') }}</label>
														<input type="number" class="form-control" name="phone" minlength="10" maxlength="15" value="{{ get_option('phone') }}" placeholder="2348060091229" required>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">{{ __('Email') }}</label>
														<input type="email" class="form-control" name="email" value="{{ get_option('email') }}" required>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">{{ __('Currency Symbol') }}</label>
														<input type="text" class="form-control" name="currency_symbol" value="{{ get_option('currency_symbol') }}" required>
													</div>

													<div class="form-group col-md-6">
														<label class="control-label">{{ __('Motto') }}</label>
														<input type="text" class="form-control " name="motto" value="{{ get_option('motto') }}" required>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">{{ __('Academic Year') }}</label>
															<select class="form-control select2" name="academic_year" required>
																{{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">{{ __('Language') }}</label>
															<select class="form-control select2" name="language">
																{{-- {!! load_language(get_option('language')) !!} --}}
															</select>
														</div>
													</div>

												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">{{ __('Instagram') }}</label>
														<input type="url" class="form-control" name="instagram" value="{{ get_option('instagram') }}" placeholder="http://www.exmaple/your_handle">
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">{{ __('Facebook') }}</label>
														<input type="url" class="form-control " name="facebook" value="{{ get_option('facebook') }}" placeholder="http://www.exmaple/your_handle">
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">{{ __('Youtube') }}</label>
														<input type="url" class="form-control " name="youtube" value="{{ get_option('youtube') }}" placeholder="http://www.exmaple/your_handle">
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">{{ __('Address') }}</label>
														<textarea class="form-control" name="address" required>{{ get_option('address') }}</textarea>
													</div>
												</div>
												<br>
												<div class="modal-footer">
													<button type="reset" class="btn btn-danger"> {{ __('Reset') }}</button>
													<button type="submit" class="btn btn-main"> {{ __('Save Settings') }}</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div id="passport" class="tab-pane fade ">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<div class="card">
										<div class="card-header">{{ __('Upload Passport') }} <span class="small text-danger">image must be less than 250kb</span></div>
										<div class="card-body">
											@if (Auth::user()->image != "profile.png" || Auth::user()->image = null)
											<form method="post" class="bp-submit" autocomplete="on" action="{{ route('upload_logo') }}" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<input type="file" class="form-control dropify" name="logo" data-max-file-size="8M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="{{ get_logo() }}" required>
												</div>
												{{-- <br> --}}
												<hr>
												<div class="modal-footer">
													<button type="reset" class="btn btn-danger"> {{ __('Reset') }}</button>
													<button type="submit" class="btn btn-main"> {{ __('Save Logo') }}</button>
												</div>
											</form>
											@else
											<div class="alert alert-info">
												Passport photograph has been uploaded earlier. To change email <a href="mailTo:" class="btn warning">{{ get_option('email') }}</a>
											</div>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection