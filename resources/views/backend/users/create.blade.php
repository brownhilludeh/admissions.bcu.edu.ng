@extends('layouts.backend')
@section('title', ' Create Subjects')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card custom-card">
            <div class="card-header ">
                <div class="card-title">
                    {{ __('Add New Create') }}
                </div>
            </div>
            <div class="card-body">
                <form method="post" class="bp-submit-validate validate" autocomplete="on" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"> {{ __('Email') }} </label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">{{ __('Phone') }}</label>
                            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">{{ __('Username') }}</label>
                            <input type="username" class="form-control" name="username" value="{{ old('username') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">{{ __('Password') }}</label>
                            <input type="text" class="form-control" value="{{ old('password') }}" name="password" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">{{ __('User Type') }}</label>
                            <select name="user_type" id="user_type" class="form-control select2" required>
                                <option value="">{{ __('Select One') }}</option>
                                <option value="Admin">{{ __('Admin') }}</option>
                                <option value="Accountant">{{ __('Accountant') }}</option>
                                <option value="Employee">{{ __('Employee') }}</option>
                                <option value="Teacher" disabled>{{ __('Teacher') }}</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label class="control-label">{{ __('Profile') }}</label>
                            <input type="file" class="form-control dropify" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm">{{ __('Reset') }}</button> &nbsp;
                        <button type="submit" class="btn btn-main btn-sm">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
