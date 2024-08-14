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
                <label class="control-label">{{ __('End Date') }}</label>
                <input type="date" class="form-control" name="ending_date" value="{{ old('ending_date') }}" placeholder="Choose date">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="float-end">
            <button type="reset" class="btn btn-danger btn-sm">{{ __('Reset') }}</button>
            <button type="submit" class="btn btn-primary btn-sm">{{ __('Save') }}</button>
        </div>
    </div>
</form>
