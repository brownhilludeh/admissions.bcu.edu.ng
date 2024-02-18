@extends('layouts.backend')
@section('title', 'Create Academic Session')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ __('Create Session') }}
            </div>
            <div class="card-body">
                <form method="post" class="bp-submit-validate" autocomplete="off" action="{{ route('academic_years.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Session Name') }}</label>
                            <input type="text" class="form-control" name="session" value="{{ old('session') }}" required>
                        </div>
                    </div>
        
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Academic Year') }}</label>
                            <input type="text" class="form-control year" name="year" value="{{ old('year') }}" required>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm">{{ __('Reset') }}</button> &nbsp;
                        <button type="submit" class="btn btn-main btn-sm">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
