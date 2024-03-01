@extends('layouts.backend')
@section('title', ' Add New User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Add New User') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" class="form-horizontal validate" autocomplete="on" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Email') }}</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Username') }}</label>
                            <div class="col-sm-9">
                                <input type="username" class="form-control" name="username" value="{{ __('cbt') }}<?php echo rand(1000, 9999); ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Phone') }}</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="+234" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Password') }}</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Confirm Password') }}</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('User Type') }}</label>
                            <div class="col-sm-9">
                                <select name="user_type" id="user_type" class="form-control select2" required>
                                    <option value="">{{ __('Select One') }}</option>
                                    <option value="Admin">{{ __('Admin') }}</option>
                                    <option value="Accountant">{{ __('Accountant') }}</option>
                                    <option value="Librarian">{{ __('Librarian') }}</option>
                                    <option value="Employee">{{ __('Employee') }}</option>
                                    <option value="Teacher" disabled>{{ __('Teacher') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-3">
                            <label class="col-sm-3 control-label">{{ __('Profile') }}</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control dropify" name="image"
                                    data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn app-blue">{{ __('Add User') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        $("#user_type").val("{{ old('user_type') }}");
        $("#role_id").val("{{ old('role_id') }}");
    </script>
@endsection
