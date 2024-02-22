@extends('layouts.backend')
@section('title', 'General Settings')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 justify-content-center text-center mb-2">
			<ul class="nav nav-tabs setting-tab">
				<li class="btn btn-main col m-1"><a data-bs-toggle="tab" href="#general" aria-selected="true">{{ __('General') }}</a></li>
				<li class="btn btn-main col m-1"><a data-bs-toggle="tab" href="#logo" aria-selected="true">{{ __('Logo') }}</a></li>
				<li class="btn btn-main col m-1"><a data-bs-toggle="tab" href="#stamp" aria-selected="true">{{ __('Stamp') }}</a></li>
				<li class="btn btn-main col m-1"><a data-bs-toggle="tab" href="#about" aria-selected="true">{{ __('About') }}</a></li>
				<li class="btn btn-main col m-1"><a data-bs-toggle="tab" href="#video" aria-selected="truue">{{ __('videos') }}</a></li>
				<li class="btn btn-main col m-1"><a data-bs-toggle="tab" href="#email" aria-selected="true">{{ __('Email SMTP') }}</a></li>
				<li class="btn btn-main col m-1"><a data-bs-toggle="tab" href="#sms" aria-selected="true">{{ __('SMS') }}</a></li>
				{{-- <li class="btn btn-main"><a data-bs-toggle="tab" role="tab" href="#payment_gateway" aria-selected="false">{{ __('Payment Gateway') }}</a></li> --}}
			</ul>
		</div>

		<div class="col-12">
			<div class="tab-content">
				<div id="general" class="tab-pane fade show">
					<div class="card">
						<div class="card-header">{{ __('General Settings') }}</div>
						<div class="card-body">
							<form method="post" class="bp-submit validate " autocomplete="on" action="{{ route('general_settings') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
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
									<div class="form-group col-md-6">
										<label class="control-label">{{ __('LinkedIn') }}</label>
										<input type="url" class="form-control" name="linkedin" value="{{ get_option('linkedin') }}" placeholder="http://www.exmaple/your_handle">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label">{{ __('Whatsapp') }}</label>
										<input type="url" class="form-control" name="whatsapp" value="{{ get_option('whatsapp') }}" placeholder="2348060091229">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label">{{ __('Twitter') }}</label>
										<input type="url" class="form-control " name="twitter" value="{{ get_option('twitter') }}" placeholder="http://www.exmaple/your_handle">
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

				<div id="logo" class="tab-pane fade col-md-6">
					<div class="card">
						<div class="card-header">{{ __('Upload Logo') }} <span class="small text-danger">Image must be less than 250kb</span></div>
						<div class="card-body">
							<form method="post" class="bp-submit" autocomplete="on" action="{{ route('upload_logo') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<input type="file" class="form-control dropify" name="logo" data-max-file-size="8M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="{{ get_logo() }}" required>
								</div>
								<hr>
								<div class="modal-footer">
									<button type="reset" class="btn btn-danger"> {{ __('Reset') }}</button>
									<button type="submit" class="btn btn-main"> {{ __('Save Logo') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				{{-- <div id="stamp" class="tab-pane fade col-md-6">
					<div class="card">
						<div class="card-header"> {{ __('Upload Stamp') }} <span class="small text-danger">image must be less than 250kb</span></div>
						<div class="card-body">
							<form method="post" class="bp-submit" autocomplete="on" action="{{ route('upload_stamp') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<input type="file" class="form-control dropify" name="stamp" data-max-file-size="8M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="{{ get_stamp() }}" required>
								</div>
								<hr>
								<div class="modal-footer">
									<button type="reset" class="btn btn-danger"> {{ __('Reset') }}</button>
									<button type="submit" class="btn btn-main"> {{ __('Save Stamp') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div> --}}

				{{-- <div id="email" class="tab-pane fade">
					<div class="card">
						<div class="card-header"><span class="card-title">{{ __('Email Settings') }}</span></div>
						<div class="card-body">
							<form method="post" class="bp-submit" autocomplete="on" action="{{ route('general_settings') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('Mail Type') }}</label>
											<select class="form-control niceselect wide" name="mail_type" id="mail_type" required>
												<option value="mail" {{ get_option('mail_type')=='mail' ? 'selected' : '' }}>{{ __('PHP Mail') }}</option>
												<option value="smtp" {{ get_option('mail_type')=='smtp' ? 'selected' : '' }}>{{ __('SMTP') }}</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('From Email') }}</label>
											<input type="text" class="form-control" name="from_email" value="{{ get_option('from_email') }}" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('From Name') }}</label>
											<input type="text" class="form-control" name="from_name" value="{{ get_option('from_name') }}" required>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('SMTP Host') }}</label>
											<input type="text" class="form-control smtp" name="smtp_host" value="{{ get_option('smtp_host') }}">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('SMTP Port') }}</label>
											<input type="text" class="form-control smtp" name="smtp_port" value="{{ get_option('smtp_port') }}">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('SMTP Username') }}</label>
											<input type="text" class="form-control smtp" autocomplete="on" name="smtp_username" value="{{ get_option('smtp_username') }}">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('SMTP Password') }}</label>
											<input type="password" class="form-control smtp" autocomplete="on" name="smtp_password" value="{{ get_option('smtp_password') }}">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('SMTP Encryption') }}</label>
											<select class="form-control smtp" name="smtp_encryption">
												<option value="ssl" {{ get_option('smtp_encryption')=='ssl' ? 'selected' : '' }}>{{ __('SSL') }}</option>
												<option value="tls" {{ get_option('smtp_encryption')=='tls' ? 'selected' : '' }}>{{ __('TLS') }}</option>
											</select>
										</div>
									</div>
								</div>
								<hr>
								<div class="modal-footer">
									<button type="reset" class="btn btn-danger"> {{ __('Reset') }}</button>
									<button type="submit" class="btn btn-main"> {{ __('Save Settings') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div> --}}

				{{-- <div id="about" class="tab-pane fade">
					<div class="card">
						<div class="card-header"><span class="card-title">{{ __('Institution Infomation') }}</span></div>
						<div class="card-body">
							<form method="post" class="bp-submit-validate" autocomplete="on" action="{{ route('general_settings') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<div class="col-md-12">
										<label class="control-label">{{ __('About') }}
											<span style="font-size:12px;" class="text-danger">
												200 to 500 words</span> </label>
										<textarea class="form-control" name="about" required>{{ get_option('about') }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<label class="control-label">{{ __('Vision') }} <span style="font-size:12px;" class="text-danger">
												200 to 500 words</span> </label>
										<textarea class="form-control" name="vision" required>{{ get_option('vision') }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<label class="control-label">{{ __('Mission') }}
											<span style="font-size:12px;" class="text-danger"> 500 words</span>
										</label>
										<textarea class="form-control" name="mission" required>{{ get_option('mission') }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<label class="control-label">{{ __('Core Value') }} <span style="font-size:12px;" class="text-danger">
												200words</span> </label>
										<textarea class="form-control" name="value">{{ get_option('value') }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<label class="control-label">{{ __('Description') }}
											<span style="font-size:12px;" class="text-danger">Short descripption about your institution. </span>
										</label>
										<textarea class="form-control" name="escription">{{ get_option('description') }}</textarea>
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
				</div> --}}

				{{-- <div id="sms" class="tab-pane fade col-md-6">
					<div class="card ">
						<div class="card-header"><span class="card-title">{{ __('SMS Settings') }}</span></div>
						<div class="card-body">
							<form method="post" class="appsvan-submit " autocomplete="on" action="{{ url('administration/general_settings/update') }}" enctype="multipart/form-data">
								{{ csrf_field() }}

								<div class="col-12">
									<div class="form-group">
										<label class="control-label">{{ __('TWILIO SID') }}</label>
										<input type="text" class="form-control" name="TWILIO_SID" value="{{ get_option('TWILIO_SID') }}" required>
									</div>
								</div>

								<div class="col-12 clear">
									<div class="form-group">
										<label class="control-label">{{ __('TWILIO TOKEN') }}</label>
										<input type="text" class="form-control" name="TWILIO_TOKEN" value="{{ get_option('TWILIO_TOKEN') }}" required>
									</div>
								</div>

								<div class="col-12 clear">
									<div class="form-group">
										<label class="control-label">{{ __('TWILIO MOBILE NUMBER') }}</label>
										<input type="text" class="form-control" name="TWILIO_MOBILE" value="{{ get_option('TWILIO_MOBILE') }}" required>
									</div>
								</div>
								<hr>
								<div class="modal-footer">
									<button type="reset" class="btn btn-danger"> {{ __('Reset') }}</button>
									<button type="submit" class="btn btn-main"> {{ __('Save Settings') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div> --}}

				{{-- <div id="payment_gateway" class="tab-pane fade">
					<div class="card ">
						<div class="card-header"><span class="card-title">{{ __('Payment Gateway') }}</span></div>
						<div class="card-body">
							<form method="post" class="appsvan-submit " autocomplete="on" action="{{ url('administration/general_settings/update') }}" enctype="multipart/form-data">
								{{ csrf_field() }}

								<h5>{{ __('PayPal') }}</h5>
								<div class="">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('PayPal Active') }}</label>
											<select class="form-control" name="paypal_active" required>
												<option value="Yes">{{ __('Yes') }}</option>
												<option value="No">{{ __('No') }}</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('PayPal Email') }}</label>
											<input type="text" class="form-control" name="paypal_email" value="{{ get_option('paypal_email') }}">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('PayPal Currency') }}</label>
											<select class="form-control" name="paypal_currency" required>
												<option value="USD">{{ __('USD') }}</option>
												<option value="EUR">{{ __('EUR') }}</option>
												<option value="AUD">{{ __('AUD') }}</option>
												<option value="CAD">{{ __('CAD') }}</option>
												<option value="NZD">{{ __('NZD') }}</option>
												<option value="GBP">{{ __('GBP') }}</option>
											</select>
										</div>
									</div>
								</div>

								<h5>{{ __('Stripe') }}</h5>
								<div class="">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('Stripe Active') }}</label>
											<select class="form-control" name="stripe_active" required>
												<option value="Yes">{{ __('Yes') }}</option>
												<option value="No">{{ __('No') }}</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('Secret Key') }}</label>
											<input type="text" class="form-control" name="stripe_secret_key" value="{{ get_option('stripe_secret_key') }}">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('Publishable Key') }}</label>
											<input type="text" class="form-control" name="stripe_publishable_key" value="{{ get_option('stripe_publishable_key') }}">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">{{ __('Stripe Currency') }}</label>
											<select class="form-control" name="stripe_currency" required>
												<option value="USD">{{ __('NGN') }}</option>
												<option value="USD">{{ __('USD') }}</option>
												<option value="EUR">{{ __('EUR') }}</option>
												<option value="AUD">{{ __('AUD') }}</option>
												<option value="CAD">{{ __('CAD') }}</option>
												<option value="NZD">{{ __('NZD') }}</option>
												<option value="GBP">{{ __('GBP') }}</option>
											</select>
										</div>
									</div>
								</div>
								<hr>
								<div class="modal-footer">
									<button type="reset" class="btn btn-danger"> {{ __('Reset') }}</button>
									<button type="submit" class="btn btn-main"> {{ __('Save Settings') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
</div>
@endsection

@section('js-script')
<script type="text/javascript">
	if ($("#mail_type").val() != "smtp") {
            $(".smtp").prop("disabled", true);
        }
        $(document).on("change", "#mail_type", function() {
            if ($(this).val() != "smtp") {
                $(".smtp").prop("disabled", true);
            } else {
                $(".smtp").prop("disabled", false);
            }
        });
</script>

@stop