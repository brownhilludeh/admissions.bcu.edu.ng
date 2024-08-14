@extends('layouts.backend')
@section('title', 'Show My Profile ')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('User Profile') }}
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>{{ __('Session') }}</td>
                        <td colspan="3">{{ $user->last_name }}, {{ $user->first_name }} {{ $user->other_name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Username') }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ __('Email') }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Phone') }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ __('User Type') }}</td>
                        <td>{{ $user->user_type }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('City/Town') }}</td>
                        <td>{{ $user->profile->lga }}</td>
                        <td>{{ __('State') }}</td>
                        <td>{{ $user->profile->state }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Joined') }}</td>
                        <td>{{ $user->profile->date_joined }}</td>
                        <td>{{ __('Marital Status') }}</td>
                        <td>{{ $user->profile->marital_status }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Religion') }}</td>
                        <td>{{ $user->profile->religion }}</td>
                        <td>{{ __('BOD') }}</td>
                        <td>{{ $user->profile->birthday }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Address 1') }}</td>
                        <td>{{ $user->profile->permanent_address }}</td>
                        <td>{{ __('Address 2') }}</td>
                        <td>{{ $user->profile->current_address }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
