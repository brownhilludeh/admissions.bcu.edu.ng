@extends('layouts.backend')
@section('title', 'View Academic Session')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('View Academic Session') }}
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>{{ __('Session') }}</td>
                        <td>{{ $academicYear->session }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Year') }}</td>
                        <td>{{ $academicYear->year }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Start Date') }}</td>
                        <td>{{ $academicYear->starting_date }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('End Date') }}</td>
                        <td>{{ $academicYear->ending_date }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection