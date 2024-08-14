<form action="{{ route('users.update', $user['id']) }}" autocomplete="on" class="bp-submit-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
    <div class="row mb-3 justify-content-end">
        <div class="col-md-3">{{ $user->profile->random_code }}</div>
        <div class="form-group col-md-3 ">
                            <input type="file" class="form-control dropify" data-max-file-size-preview="5K" data-height="300" data-weight="300" data-default-file="{{ asset('uploads/images/' . Auth::user()->image) }}" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG " value="{{ old('image') }}" required>
        </div>
    </div>
    <div class="card-footer mt-2">
        <p class="lead">{{ __('USER INFORMATION') }}</p>
    </div>
    <div class="row mb-3">
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('First Name') }}</label>
            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required disabled>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('Middle Name') }}</label>
            <input type="text" class="form-control" name="other_name" value="{{ $user->other_name }}">
        </div>
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('Surname') }}</label>
            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" disabled required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="form-group col-md-4">
            <label class="control-label" for="country">{{ __('Country') }}</label>
            <input type="text" class="form-control" name="country" value="{{ $user->profile->country }}" required>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" for="state">{{ __('State') }}</label>
            <input type="text" class="form-control" name="state" value="{{ $user->profile->state }}" required>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" for="lga">{{ __('Local Govt/City/Town') }}</label>
            <input type="text" class="form-control" name="lga" value="{{ $user->profile->lga }}" required>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('Birthday') }}</label>
            <input type="date" class="form-control" name="birthday" max="@php echo date('Y-m-d'); @endphp" value="{{ $user->profile->birthday }}" required>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('Religion') }}</label>
            <select name="religion" class="form-control nice-select wide" value="{{ $user->profile->religion }}" required>
                <option value="{{ $user->profile->religion }}">{{ $user->profile->religion }}</option>
                <option @if (old('religion')=='Christianity' ) selected @endif value="Christianity">
                    {{ __('Christianity') }}</option>
                <option @if (old('religion')=='Islam' ) selected @endif value="Islam">
                    {{ __('Islam') }}</option>
                <option @if (old('religion')=='Others' ) selected @endif value="Others">
                    {{ __('Others') }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="marital_status" class="control-label">{{ __('Marital Status') }}</label>
            <select id="marital_status" name="marital_status" class="form-control nice-select wide" value="{{ $user->profile->marital_status }}" required>
                <option value="{{ $user->profile->marital_status }}">{{ $user->profile->marital_status }}</option>
                <option @if (old('marital_status')=='Single' ) selected @endif value="Single">Single</option>
                <option @if (old('marital_status')=='Married' ) selected @endif value="Married">Married</option>
                <option @if (old('marital_status')=='Divorced' ) selected @endif value="Divorced">Divorced</option>
                <option @if (old('marital_status')=='Separated' )selected @endif value="Separated">Separated</option>
                <option @if (old('marital_status')=='Windowed' )selected @endif value="Windowed">Windowed</option>
                <option @if (old('marital_status')=='Confused' )selected @endif value="Confused" disabled>Confused</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="qualification" class="control-label">{{ __('Qualification/Level') }}</label>
            <input id="qualification" type="text" class="form-control" name="qualification" value="{{ $user->profile->qualification }}">
        </div>
        <div class="col-md-4">
            <label for="permanent_address" class="control-label">{{ __('Home Address') }}</label>
            <input id="permanent_address" type="text" class="form-control" name="permanent_address" value="{{ $user->profile->permanent_address }}" required>
        </div>
        <div class="col-md-4">
            <label for="current_address" class="control-label">{{ __('Home Address 2') }} <span><small class="text-danger">ignore if same address</small></span></label>
            <input id="current_address" type="text" class="form-control" name="current_address" value="{{ $user->profile->current_address }}">
        </div>
        <div class="col-md-4">
            <label for="contract_type" class="control-label">{{ __('Type') }}</label>
            <select id="contract_type" name="contract_type" class="form-control nice-select wide" value="{{ $user->profile->contract_type }}" required>
                <option value="{{ $user->profile->contract_type }}">{{ $user->profile->contract_type }}</option>
                <option @if (old('FT')=='FT' ) selected @endif value="FT">Full Time</option>
                <option @if (old('PT')=='PT' ) selected @endif value="PT">Part Time</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="portfolio_url" class="control-label">{{ __('Portfolio Url') }}</label>
            <input id="portfolio_url" type="url" class="form-control" name="portfolio_url" value="{{ $user->profile->portfolio_url }}" placeholder="https://example.com">
        </div>
        <div class="col-md-4">
            <label for="facebook_url" class="control-label">{{ __('Facebook Url') }}</label>
            <input id="facebook_url" type="url" class="form-control" name="facebook_url" value="{{ $user->profile->facebook_url }}" placeholder="https://example.com">
        </div>
        <div class="col-md-4">
            <label for="instagram_url" class="control-label">{{ __('Instagram Url') }}</label>
            <input id="instagram_url" type="url" class="form-control" name="instagram_url" value="{{ $user->profile->instagram_url }}" placeholder="https://example.com">
        </div>
        <div class="col-md-4">
            <label for="twitter_url" class="control-label">{{ __('X Url') }}</label>
            <input id="twitter_url" type="url" class="form-control" name="twitter_url" value="{{ $user->profile->twitter_url }}" placeholder="https://example.com">
        </div>
        <div class="col-md-4">
            <label for="skills" class="control-label">{{ __('Skills') }}</label>
            <input id="skills" type="text" class="form-control" name="skills" value="{{ $user->profile->skills }}" placeholder="e.g. Reading, Swimming, Trekking">
        </div>

    </div>

    <div class="form-group col-md-12">
        <label for="about" class="control-label">{{__('About')}}</label>
        <textarea class="form-control" id="editor" name="about" required>{{ $user->profile->about }}</textarea>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm float-end">{{ __('Submit Application') }}</button>
    </div>
</form>
