@extends('layouts.backend')
@section('title', 'Super Admin Dashboard')
@section('content')
<div class="row">
  <div class="col-xl-3 col-md-6 lead mb-2">
    <div class="card rounded-3 h-100">
      <a href="{{url('users.student')}}">
        <div class="card-body mx-3">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs  text-uppercase mb-1">{{ __('All Applicants') }}</div>
              <div class="h5 mb-0 ">{{ Auth::user()->count() }}</div>
            </div>
            <div class="col-auto">
              <ion-icon name="people-outline"></ion-icon>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 lead mb-2 ">
    <div class="card bg__peach rounded-3 h-100">
      <a href="{{ url('active.student') }}">
        <div class="card-body mx-3">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs text-uppercase mb-1">{{ get_academic_year() }} {{ __('Students') }}</div>
              <div class="h5 mb-0 text-gray-400">{{ __("Student") }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-shield fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 lead mb-2">
    <div class="card rounded-3 h-100">
      <a href="{{url('teachers.index')}}">
        <div class="card-body mx-3">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs  text-uppercase mb-1">{{ __('Teachers') }}</div>
              <div class="h5 mb-0 ">{{ __("Teacher") }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard-teacher fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 lead mb-2">
    <div class="card rounded-3 h-100">
      <a href="{{url('users.index')}}">
        <div class="card-body mx-3">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs text-uppercase mb-1">{{ __('Admins') }}</div>
              <div class="h5 mb-0 text-info">{{ __('Admin') }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users-cog fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 lead mb-2">
    <div class="card rounded-3 h-100">
      <a href="{{url('parents.index')}}">
        <div class="card-body mx-3">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs text-uppercase mb-1">{{ __('Parent Account') }}</div>
              <div class="h5 mb-0 text-gray-400">{{ __("Parent") }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-check fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 lead mb-2">
    <div class="card rounded-3 h-100">
      <div class="card-body mx-3">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs text-danger text-uppercase mb-1">{{ __('Inactive : Active Account') }}</div>
            <div class="h5 mb-0 text-gray-400">{{ auth()->user()->where('status', '=', '0')->count() }} : {{ auth()->user()->where('status', '=', '1')->count() }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-times fa-2x text-gray-500"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 lead mb-2">
    <div class="card rounded-3 h-100">
      <div class="card-body mx-3">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs text-danger text-uppercase mb-1">{{ __('Termly Subscription') }}</div>
            <div class="h5 mb-0 text-gray-400">N{{ __('NGN') }} </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-handshake fa-2x text-gray-500"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 lead mb-2">
    <div class="card rounded-3 h-100">
      <a href="{{url('invoices.index')}}">
        <div class="card-body mx-3">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs text-danger text-uppercase mb-1">{{ __('Monthly Income') }}</div>
              <div class="h5 mb-0 text-gray-400">{{ __("Student") }} </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-money-bill fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection