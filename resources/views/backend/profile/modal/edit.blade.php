<form action="{{ route('profile.update', Auth::user()->id ) }}" class="ajax-submit" enctype="multipart/form-data" method="post" accept-charset="utf-8">
  @csrf
  <div class="row">
    <label class="col-sm-3 control-label">{{ __('Name') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name" value="{{$profile->name}}" required>
    </div>
  </div>
  <div class="row">
    <label class="col-sm-3 control-label">{{ __('Email') }}</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="email" value="{{ $profile->email }}" required>
    </div>
  </div>
  <div class="row mb-2">
    <label class="col-sm-3 control-label">{{ __('Image') }}</label>
    <div class="col-sm-9">
      <input type="file" class="form-control dropify" data-default-file="{{ asset('public/uploads/images/'.$profile->image) }}" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
    </div>
  </div>

  <div class="modal-footer">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-info btn-block">{{ __('Update Profile') }}</button>
    </div>
  </div>
</form>