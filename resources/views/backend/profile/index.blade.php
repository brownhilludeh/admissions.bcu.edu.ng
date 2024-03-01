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
						@if (Auth::User()->user_type == 'Applicant')
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#documents" aria-selected="true">{{ __('Documents') }}</a></li>
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#examass" aria-selected="true">{{ __('Eaxm Psss/Docket') }}</a></li>
						@endif
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#password" aria-selected="true">{{ __('password') }}</a></li>
						<li class="btn btn-main col  m-1"><a href="{{ route('password.request') }}" aria-selected="true">{{ __('Reset Password') }}</a></li>
					</ul>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-12">
					<div class="tab-content">
						{{-- pprofile --}}
						<div id="myProfile" class="tab-pane fade show">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<div class="card">
										<div class="card-header">
											{{__('Profile')}}
										</div>
										<div class="card-body">
											<table class="table table-bordered table-striped" width="100%">
												<tbody>
													<tr class="text-center">
														<td colspan="2"><img src="{{ asset('storage/uploads/images/'.$profile->image) }}" style="width: 230px; border-radius: 5px"></td>
													</tr>
													<tr>
														<td>{{ __('Name') }}</td>
														<td>{{ $profile->name }}</td>
													</tr>
													<tr>
														<td>{{ __('User Type') }}</td>
														<td>{{ $profile->user_type }}</td>
													</tr>
													<tr>
														<td>{{ __('Email') }}</td>
														<td>{{ $profile->email }}</td>
													</tr>
													<tr>
														<td>{{ __('Phone') }}</td>
														<td>{{ $profile->phone }}</td>
													</tr>
													<tr>
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
													<tr>
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

								<div class="col-md-6">
									@if (Auth::user()->user_type == 'Applicant')
											<div class="alert alert-success">
												Helo,
												<br>
												Your applicant is still under review. You will get an email on your admission status once decission has been made.
												<br>
												Thank you for apllication and goodluck
											
												<br>
												<p class="mt-3">
													Click to <a href="http://" class="btn btn-main">Complete your registration for {{ get_academic_year() }}</a> session
												</p>
											</div>
									@endif
								</div>
							</div>
						</div>

						{{-- passport --}}
						<div id="documents" class="tab-pane fade ">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<div class="card">
										<div class="card-header">{{ __('Upload Passport') }} <span class="small text-danger">image must be less than 250kb</span></div>
										<div class="card-body">
											@if (Auth::user()->image != "avatar.png" || Auth::user()->image = null)
											<form method="post" class="bp-submit" autocomplete="on" action="{{ route('upload_logo') }}" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<div>documrnetssddf</div>
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

						{{-- passport --}}
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

						{{-- Password --}}
						<div id="password" class="tab-pane fade ">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<div class="card">
										<div class="card-header">
											{{ __('Change Password') }}
										</div>
										<div class="card-body">
											<form action="{{ route('updatePassword', Auth::user()->id) }}" class="bp-submit-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
												@csrf
												<div class="form-group">
													<label class="control-label">{{ __('Old Password') }}</label>
													<input type="password" class="form-control" name="oldPassword" value="{{ ('old_password') }}" required>
												</div>
												<div class="mb-3">
													<label for="password" class="form-label">{{ __('Password') }}</label>
													<input id="password" type="password" class="form-control" name="password" required value="{{ old('password') }}" placeholder="Enter a strong password" autocomplete="password">

												</div>
												<div class="mb-3">
													<label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
													<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="Confirm password">
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection