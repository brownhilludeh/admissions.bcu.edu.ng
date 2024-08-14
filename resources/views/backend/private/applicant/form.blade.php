@extends('layouts.backend')
@section('title', 'Applicant Registration Form')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Registration Form') }}
                </div>
                <small class="text-danger">File format: png, JPEG, jgp, pdf MAx size: 250kb</small>
            </div>
            <div class="card-body">
                <form action="{{ route('my.application.store') }}" autocomplete="on" class="form-horizontal validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="card-footer mt-2">
                        <p class="lead">{{ __('REGISTRATION INFORMATION') }}</p>
                    </div>
                    <div class="row mb-4">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="jamb_reg_no">{{ __('UTME Reg. Number') }}</label>
                            <input type="text" class="form-control" name="jamb_reg_no" value="{{ old('jamb_reg_no') }}" @required(true)>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="o_level_reg_1">{{ __("O'Level") }} <small>1st sitting </small></label>
                            <input type="text" class="form-control" name="o_level_reg_1" value="{{ old('o_level_reg_1') }}" @required(true)>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="o_level_reg_2">{{ __("O'Level") }} <small>2nd sitting </small></label>
                            <input type="text" class="form-control" name="o_level_reg_2" value="{{ old('o_level_reg_2') }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Programme') }}</label>
                            <select name="class" class="form-control" id="programme" value="{{ old('Programme') }}" onchange="showClass(this.value);" required>
                                <option value="">{{ __('Select One') }}</option>
                                {{ create_option('classes', 'id', 'class_name', old('class')) }}
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('College') }}</label>
                            <input type="text" class="form-control" name="other_name" value="{{ $user->other_name }}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Middle Name') }}</label>
                            <input type="text" class="form-control" name="other_name" value="{{ $user->other_name }}" disabled>
                        </div>


                        <div class="form-group col-md-4">
                            <label class="control-label" for="jamb_result" @required(true)>{{ __('UTME Result') }}</label>
                            <input type="file" class="form-control dropify" data-max-file-size-preview=".5M" name="jamb_result" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" value="{{ old('jamb_result') }}" @required(true)>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="o_level_1">{{ __("O'level Result") }}</label> <small class="text-danger" style="font-size:12px;">1st sitting</small>
                            <input type="file" class="form-control dropify" data-max-file-size-preview=".5M" name="o_level_1" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" value="{{ old('o_level_1') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="o_level_2">{{ __("O'level Result") }}</label> <small class="text-danger" style="font-size:12px;">2nd Sitting</small>
                            <input type="file" class="form-control dropify" data-max-file-size-preview=".5M" name="o_level_2" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" value="{{ old('o_level_2') }}" placeholder="If two sittings">
                        </div>
                    </div>
                    <div class="card-footer mt-2">
                        <p class="lead">{{ __('PROFILE INFORMATION') }}</p>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="country">{{ __('Country') }}</label>
                            <input type="text" class="form-control" name="country" value="{{ old('country') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="state">{{ __('State') }}</label>
                            <input type="text" class="form-control" name="state" value="{{ old('state') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="lga">{{ __('Local Govt/City/Town') }}</label>
                            <input type="text" class="form-control" name="lga" value="{{ old('lga') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Birthday') }}</label>
                            <input type="date" class="form-control" name="birthday" max="@php echo date('Y-m-d'); @endphp" value="{{ old('birthday') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Religion') }}</label>
                            <select name="religion" class="form-control" required>
                                <option value="">{{ __('Select One') }}</option>
                                <option @if (old('religion')=='Christianity' ) selected @endif value="Christianity">
                                    {{ __('Christianity') }}</option>
                                <option @if (old('religion')=='Islam' ) selected @endif value="Islam">
                                    {{ __('Islam') }}</option>
                                <option @if (old('religion')=='Others' ) selected @endif value="Others">
                                    {{ __('Others') }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Joined') }}</label>
                            <input type="text" class="form-control" name="birthday" value="{{ date(" D, F d, Y", strtotime($user->profile->date_joined)) }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="marital_status" class="control-label">{{ __('Marital Status') }}</label>
                            <select id="marital_status" name="marital_status" class="form-control select2" required>
                                <option value="">Select One</option>
                                <option @if (old('marital_status')=='Single' ) selected @endif value="Single">Single</option>
                                <option @if (old('marital_status')=='Married' ) selected @endif value="Married">Married</option>
                                <option @if (old('marital_status')=='Divorced' ) selected @endif value="Divorced">Divorced</option>
                                <option @if (old('marital_status')=='Separated' )selected @endif value="Separated">Separated</option>
                                <option @if (old('marital_status')=='Windowed' )selected @endif value="Windowed">Windowed</option>
                                <option @if (old('marital_status')=='Confused' )selected @endif value="Confused" disabled>Confused</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="qualification" class="control-label">{{ __('Qualification/Level') }}</label>
                            <input id="qualification" type="text" class="form-control" name="qualification" value="{{ old('qualification') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="permanent_address" class="control-label">{{ __('Home Address') }}</label>
                            <input id="permanent_address" type="text" class="form-control" name="permanent_address" value="{{ old('permanent_address') }}">
                        </div>
                    </div>

                    <div class="card-footer mt-2">
                        <p class="lead">{{ __('USER INFORMATION') }}</p>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('First Name') }}</label>
                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Middle Name') }}</label>
                            <input type="text" class="form-control" name="other_name" value="{{ $user->other_name }}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Surname') }}</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" disabled required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Permanent Address') }}</label> <span class="text-danger">ignore if same address</span>
                            <textarea class="form-control" name="permanent_address" value="{{ old('permanent_address') }}">{{ old('permanent_address') }}</textarea>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">{{ __("Birth Certificate") }}</label>
                            <input type="file" class="form-control dropify" data-max-file-size-preview="1M" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>
                    </div>


                    {{-- <span class=" fs-15 d-block mb-3">DOCUMENT UPLOAD :</span> --}}

                    {{-- <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Class') }}</label>
                        <select name="class" class="form-control" id="class" value="{{ old('class') }}" onchange="showClass(this.value);" required>
                            <option value="">{{ __('Select One') }}</option>
                            {{ create_option('classes', 'id', 'class_name', old('class')) }}
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Register No.') }}</label>
                        <input type="text" class="form-control" name="reg_no" value="{{ old('reg_no') }}" placeholder="eg. {{ get_option('school_abbv') }}<?php echo rand(0001, 9999);?>">
                    </div> --}}
                    {{-- <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Section') }}</label>
                        <select name="section" class="form-control" id="section" required>
                            <option value="">{{ __('Select One') }}</option>
                            @foreach ($sections as $data)
                            <option data-class="{{ $data->class_id }}" value="{{ $data->id }}">{{ $data->section_name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="form-group col-md-4">
                        <label class="control-label">{{ __('UserID') }}</label>
                        <input type="text" class="form-control" name="username" value="{{ get_option('academic_year') }}<?php echo rand(1000, 9999); ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Roll Number') }}</label>
                        <input type="number" class="form-control" name="roll" value="{{ old('roll') }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Password') }} <small class="text-danger" style="font-size:12px;">default is
                                "brownportal"</small> </label>
                        <input type="text" class="form-control" name="password" value="brownportal" readOnly>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Gender') }}</label>
                        <select name="gender" class="form-control" required>
                            <option value="">{{ __('Select One') }}</option>
                            <option @if (old('gender')=='M' ) selected @endif value="M">Male</option>
                            <option @if (old('gender')=='F' ) selected @endif value="F">Female
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Blood Group') }}</label>
                        <select name="blood_group" class="form-control">
                            <option value="">{{ __('Select One') }}</option>
                            <option @if (old('blood_group')=='N/A' ) selected @endif value="N/A">N/A </option>
                            <option @if (old('blood_group')=='A+' ) selected @endif value="A+">A+</option>
                            <option @if (old('blood_group')=='A-' ) selected @endif value="A-">A-</option>
                            <option @if (old('blood_group')=='B+' ) selected @endif value="B+">B+</option>
                            <option @if (old('blood_group')=='B-' ) selected @endif value="B-">B-</option>
                            <option @if (old('blood_group')=='AB+' ) selected @endif value="AB+">AB+</option>
                            <option @if (old('blood_group')=='AB-' ) selected @endif value="AB-">AB-</option>
                            <option @if (old('blood_group')=='O+' ) selected @endif value="O+">O+</option>
                            <option @if (old('blood_group')=='O-' ) selected @endif value="O-">O-</option>
                        </select>
                    </div> --}}
                    {{-- <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Email') }}</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Phone') }}</label>
                        <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Admission Date') }} <small class="text-danger" style="font-size:12px;">:
                                {{ __('cannot be changed') }}</small></label>
                        <input type="date" class="form-control" name="joined" value="{{ old('joined') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('State') }}</label>
                        <input type="text" class="form-control" name="state" value="{{ old('state') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Local Govt.') }}</label>
                        <input type="text" class="form-control" name="lga" value="{{ old('lga') }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Country') }}</label>
                        <input type="text" class="form-control" name="country" value="{{ old('country') }}" required>
                    </div> --}}
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Residence Address') }}</label>
                        <textarea class="form-control" name="permanent_address" required value="{{ old('permanent_address') }}">{{ old('permanent_address') }}</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">{{ __('Permanent Address') }}</label> <span class="text-danger">ignore if same address</span>
                        <textarea class="form-control" name="permanent_address" value="{{ old('permanent_address') }}">{{ old('permanent_address') }}</textarea>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="control-label">{{ __("Birth Certificate") }}</label>
                        <input type="file" class="form-control dropify" data-max-file-size-preview="1M" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-main btn-sm">{{ __('Register Student') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('js-script')
<script>
    function showDivide(val) {
            var _token = $('input[name="_token"]').val();
            var class_id = $('select[name=class]').val();
            $.ajax({
                type: "POST",
                url: "{{ url('divides/class') }}",
                data: {
                    _token: _token,
                    class_id: class_id
                },
                success: function(sections) {
                    $('select[name=section]').html(sections);
                }
            });
        }
</script>
@stop --}}
