@extends('layouts.backend')
@section('title', 'My Profile')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12  mb-2">
			<div class="row mb-2">
				<div class="col-12">
					<ul class="nav nav-tabs profile-tab">
						@if ($user->id == 1)
						<li class="btn btn-main col disabled m-1"><a data-bs-toggle="tab" href="#myProfile" aria-selected="true">{{ __('Step 1') }}</a></li>
						@endif

						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#password" aria-selected="true">{{ __('Step 2') }}</a></li>
						<li class="btn btn-main col disabled m-1"><a data-bs-toggle="tab" href="#myProfile" aria-selected="true">{{ __('Step 1') }}</a></li>
						<li class="btn btn-main col disabled m-1"><a data-bs-toggle="tab" href="#myProfile" aria-selected="true">{{ __('Step 1') }}</a></li>
						<li class="btn btn-main col disabled m-1"><a data-bs-toggle="tab" href="#myProfile" aria-selected="true">{{ __('Step 1') }}</a></li>

						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#password" aria-selected="true">{{ __('Step 2') }}</a></li>

						@if (Auth::User()->user_type == 'Applicant')
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#documents" aria-selected="true">{{ __('Documents') }}</a></li>
						<li class="btn btn-main col  m-1"><a data-bs-toggle="tab" href="#examass" aria-selected="true">{{ __('Eaxm Psss/Docket') }}</a></li>
						@endif
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
										{{-- <div class="card-body">
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
										</div> --}}
									</div>
								</div>

								<div class="col-md-6">
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