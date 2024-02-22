@extends('layouts.backend')
@section('title', 'Super Admin Dashboard')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">


          {{ __('You are logged in!') }}
          Super Admin
        </div>
      </div>
    </div>
  </div>
</div>
@endsection