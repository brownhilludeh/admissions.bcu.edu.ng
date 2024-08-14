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
                <form action="{{ route('my.application.update', Auth::user()->id) }}" autocomplete="on" class="form-horizontal validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
                            <label class="control-label" for="o_level_reg_1">{{ __("O'Level Number") }} <small>1st sitting </small></label>
                            <input type="text" class="form-control" name="o_level_reg_1" value="{{ old('o_level_reg_1') }}" @required(true)>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="o_level_reg_2">{{ __("O'Level Number") }} <small>2nd sitting </small></label>
                            <input type="text" class="form-control" name="o_level_reg_2" value="{{ old('o_level_reg_2') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Programme') }}</label>
                            <select name="programme" class="form-control select2" id="programme" value="{{ old('Programme') }}" required>
                                <option value="">{{ __('Select One') }}</option>
                                {{ create_option('classes', 'class_name', 'class_name', old('programme')) }}
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('Colleges') }}</label>
                            <select name="college" class="form-control nice-select wide" id="college" value="{{ old('college') }}" required>
                                <option value="">{{ __('Select One') }}</option>
                                {{ create_option('divides', 'divide_name', 'divide_name', old('divide')) }}
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">{{ __('UTME Score') }}</label>
                            <input type="text" class="form-control" name="jamb_score" value="{{ old('jamb_score') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="jamb_result" @required(true)>{{ __('UTME Result') }}</label>
                            <input type="file" class="form-control" data-max-file-size-preview=".5M" name="jamb_result" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG pdf" value="{{ old('jamb_result') }}" @required(true)>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="o_level_1">{{ __("O'level Result") }}</label> <small class="text-danger" style="font-size:12px;">1st sitting</small>
                            <input type="file" class="form-control" data-max-file-size-preview=".5M" name="o_level_1" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG pdf" value="{{ old('o_level_1') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="o_level_2">{{ __("O'level Result") }}</label> <small class="text-danger" style="font-size:12px;">2nd Sitting</small>
                            <input type="file" class="form-control" data-max-file-size-preview=".5M" name="o_level_2" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG pdf" value="{{ old('o_level_2') }}" placeholder="If two sittings">
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
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">{{ __('Submit Application') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
