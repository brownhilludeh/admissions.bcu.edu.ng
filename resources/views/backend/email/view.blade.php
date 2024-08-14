@extends('layouts.backend')
@section('title', 'Email View')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card custom-card ">
            <div class="card-header">
                <div class="card-title">
                    {{__('Email Log')}}
                </div>
                <a href="{{ route('emails.create') }}" class="btn btn-primary btn-sm">{{__('Compose')}}</a>
            </div>
            <div class="card-body no-export">
                {{ $emailLog->subject }}
            </div>
        </div>
    </div>
</div>
@endsection
