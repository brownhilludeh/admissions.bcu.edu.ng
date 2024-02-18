<form method="post" class="validate" autocomplete="off" action="{{ route('academic_years.update', $academicYear->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">

    <div class="form-group">
        <label for="session" class="control-label"> {{ __('Session Name') }} </label>
        <input type="text" class="form-control" id="session" name="session" value="{{ $academicYear->session }}" required>
    </div>
    <div class="form-group">
        <label for="year" class="control-label"> {{ __('Academic Year') }} </label>
        <input type="text" class="form-control year" id="year" name="year" value="{{ $academicYear->year }}" required>
    </div>
    <br>
    <div class="modal-footer">
        <button type="reset" class="btn btn-danger">{{ __('Reset') }}</button> &nbsp;
        <button type="submit" class="btn btn-main">{{ __('Save') }}</button>
    </div>
</form>
