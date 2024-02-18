<form method="post" class="ajax-submit validate" autocomplete="off" action="{{ route('academic_years.store') }}" enctype="multipart/form-data">
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