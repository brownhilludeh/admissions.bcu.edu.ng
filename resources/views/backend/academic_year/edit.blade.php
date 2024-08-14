@extends('layouts.backend')
@section('title', 'Edit Academic Session')
@section('content')

<!-- Start:: row-4 -->
<div class="row">
    <div class="col-md-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">{{ __('Update Session') }}</div>
                <a class="btn btn-primary btn-sm ajax-modal " data-title="{{ __('Add Academic Year') }}" href="{{ route('academic_years.create') }}">{{ __('Add Session') }}</a>
            </div>
            <div class="card-body">
                <form method="post" class="validate" autocomplete="off" action="{{ route('academic_years.update', $academicYear->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label class="control-label">{{ __('Session Name') }}</label>
                                <input type="text" class="form-control" name="session" value="{{ $academicYear->session }}" placeholder="2023" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ __('Academic Year') }}</label>
                                <input type="text" class="form-control year" name="year" value="{{ $academicYear->year }}" placeholder="2023-2024" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ __('Start Date') }}</label>
                                <input type="date" class="form-control humanfrienndlydate" name="starting_date" value="{{ $academicYear->starting_date }}" placeholder="Choose date" required>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ __('Start Date') }}</label>
                                <input type="date" class="form-control humanfrienndlydate" name="ending_date" value="{{ $academicYear->ending_date }}" placeholder="Choose date">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-end">
                            <button type="reset" class="btn btn-danger btn-sm">{{ __('Reset') }}</button>
                            <button type="submit" class="btn btn-primary btn-sm">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End:: row-4 -->
@endsection
