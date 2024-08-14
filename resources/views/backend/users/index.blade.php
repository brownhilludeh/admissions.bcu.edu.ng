@extends('layouts.backend')
@section('title', 'All Users Account')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{__('Users')}}
                </div>

                <select id="user_type" class="custom-select nice-select" onchange="showUser(this);">
                    <option value="">{{ __('Select One') }}</option>
                    <option @if (old('Admin')=='Admin' ) selected @endif value="Admin">{{ __('Admin') }}</option>
                    <option @if (old('Accountant')=='Accountant' ) selected @endif value="Accountant">{{ __('Accountant') }}</option>
                    <option @if (old('Librarian')=='Librarian' ) selected @endif value="Librarian">{{ __('Librarian') }}</option>
                    <option @if (old('Employee')=='Employee' ) selected @endif value="Employee">{{ __('Employee') }}</option>
                    <option @if (old('Teacher')=='Teacher' ) selected @endif value="Teacher">{{ __('Teacher') }}</option>
                    <option @if (old('Student')=='Student' ) selected @endif value="Student">{{ __('Student') }}</option>
                    <option @if (old('Applicant')=='Applicant' ) selected @endif value="Applicant">{{ __('Applicant') }}</option>
                </select>

                <a class="btn btn-primary btn-sm ajax-modall" data-title="{{ __('Add New User') }}" href="{{ route('users.create') }}"> {{__('Add New User')}}</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>{{ __('SN') }}</th>
                        <th>{{ __('Profile') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('User Type') }}</th>
                        <th>{{__('Username')}}</th>
                        <th>{{__('Phone')}}</th>
                        <th>{{__('Code')}}</th>
                        <th>{{__('Active')}}</th>
                        <th>{{__('Action')}}</th>
                    </thead>
                    <tbody>
                        @php
                        $no = +1;
                        @endphp
                        @foreach($users AS $user)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="ajax-modal" data-title="{{ __('Student Information') }}">
                                    <img src="{{ asset('uploads/images/profile/'. $user->image) }}" class="table-img" alt="">
                                </a>
                            </td>
                            <td>{{$user->last_name}}, {{$user->first_name}} {{$user->other_name[0] ?? ''}}</td>
                            <td>{{$user->user_type}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->random_code}}</td>
                            <td>
                                <a href="{{ route('userStatus', $user->id) }}" class="validate btn btn-{{ $user->is_active ? 'success' : 'danger'}} btn-sm">
                                    @if ($user->is_active == 1)
                                    <ion-icon name="checkmark-done-outline"></ion-icon> Yes
                                    @else
                                    <ion-icon name="close-outline"></ion-icon> No
                                    @endif
                                </a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <ul class="dropdown-menu text-center">
                                        <li class="mb-2">
                                            <a href="{{ route('users.show', $user['id']) }}" class="btn btn-success btn-sm ajax-modal">
                                                {{ __('View') }}
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-warning btn-sm ">
                                                {{ __('Edit') }}
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <form action="{{ route('users.destroy', $user['id']) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm btn-archive">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection('content')
@section('js-script')
<script>
    function showUser(elem) {
            if ($(elem).val() == "") {
                return;
            }
            window.location = "<?php echo url('users/account'); ?>/" + $(elem).val();
        }
</script>
@stop
