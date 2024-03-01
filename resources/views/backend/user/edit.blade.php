@extends('layouts.backend')
@section('title', ' Edit Users')
@section('content')
    <div class="row">
        <div class=" col-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Update User') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $data->id) }}" autocomplete="on" class="form-horizontal validate" enctype="multipart/form-data"
                        method="post" accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Email') }}</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" value="{{ $data->email }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('username') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" value="{{ $data->username }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Phone') }}</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="phone" value="{{ $data->phone }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Password') }}</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('Confirm Password') }}</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">{{ __('User Type') }}</label>
                            <div class="col-sm-9">
                                <select name="user_type" class="form-control select2" required>
                                    <option value="">{{ __('Select One') }}</option>
                                    <option @if ($data->user_type == 'Admin') selected @endif value="Admin">{{ __('Admin') }}</option>
                                    <option @if ($data->user_type == 'Accountant') selected @endif value="Accountant">{{ __('Accountant') }}</option>
                                    <option @if ($data->user_type == 'Librarian') selected @endif value="Librarian">{{ __('Librarian') }}</option>
                                    <option @if ($data->user_type == 'Employee') selected @endif value="Employee">{{ __('Employee') }}</option>
                                    <option @if ($data->user_type == 'Teacher') selected @endif value="Teacher">{{ __('Teacher') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-3">
                            <label class="col-sm-3 control-label">{{ __('Profile Image') }}</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control dropify" name="image"
                                    data-default-file="{{ asset('storage/uploads/' . $data->image) }}"
                                    data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn app-blue">{{ __('Update User') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
