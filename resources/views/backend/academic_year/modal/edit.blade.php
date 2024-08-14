<form method="post" class="bp-submit-validate" autocomplete="off" action="{{ route('academic_years.update', $academicYear->id) }}" enctype="multipart/form-data">
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
                <input type="date" class="form-control" name="starting_date" value="{{ $academicYear->starting_date }}" placeholder="Choose date" required>
            </div>

        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Start Date') }}</label>
                <input type="date" class="form-control" name="ending_date" value="{{ $academicYear->ending_date }}" placeholder="Choose date">
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="reset" class="btn btn-danger btn-sm">{{ __('Reset') }}</button> &nbsp;
        <button type="submit" class="btn btn-primary btn-sm">{{ __('Save Session') }}</button>
    </div>
</form>
