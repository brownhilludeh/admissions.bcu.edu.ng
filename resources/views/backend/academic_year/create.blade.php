@extends('layouts.backend')
@section('title', 'Create Academic Session')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">{{ __('Create Session') }}</div>
                <a class="btn btn-primary btn-sm ajax-modal " data-title="{{ __('Add Academic Year') }}" href="{{ route('academic_years.create') }}">{{ __('Add Session') }}</a>
            </div>
            <div class="card-body">
                <form method="post" class="bp-submit-validate validate" autocomplete="off" action="{{ route('academic_years.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label class="control-label">{{ __('Session Name') }}</label>
                                <input type="text" class="form-control" name="session" value="{{ old('session') }}" placeholder="2023" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ __('Academic Year') }}</label>
                                <input type="text" class="form-control year" name="year" value="{{ old('year') }}" placeholder="2023-2024" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ __('Start Date') }}</label>
                                <input type="date" class="form-control" name="starting_date" value="{{ old('starting_date') }}" placeholder="Choose date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ __('Start Date') }}</label>
                                <input type="date" class="form-control" name="ending_date" value="{{ old('ending_date') }}" placeholder="Choose date">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <button type="reset" class="btn btn-danger btn-sm">{{ __('Reset') }}</button>
                            <button type="submit" class="btn btn-primary btn-sm">{{ __('Save Session') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
