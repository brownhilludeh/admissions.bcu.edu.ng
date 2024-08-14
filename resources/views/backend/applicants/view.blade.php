@extends('layouts.backend')
@section('title', 'Applicant View')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ $applicant->user->last_name }}'s {{ __('Result') }}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                   <img src="{{ asset('public/uploads/images', ) }}" alt="Jamb Result">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
