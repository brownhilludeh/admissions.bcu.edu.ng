<form action="{{ route('sections.update', $section['id']) }}" autocomplete="on" class="form-horizontal validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    @csrf
    {{ method_field('PATCH') }}
    <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">{{ __('Section Name') }}</label>
            <input type="text" class="form-control" name="section_name" value="{{ $section->section_name }}" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">{{ __('Class') }}</label>
            <select name="class_id" class="form-control select2" required>
                <option value="">{{ __('Select One') }}</option>
                {{ create_option('classes', 'id', 'class_name', $section->class_id) }}
            </select>
        </div>
    </div>
    <br>
    <div class="modal-footer">
        <button type="submit" class="btn btn-main btn-sm">{{ __('Update') }}</button>
    </div>
</form>
