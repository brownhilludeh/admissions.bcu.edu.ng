<form action="{{ route('profiles.update', $profile['id']) }}" autocomplete="on" class="form-horizontal bp-submit-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
    <div class="row mb-3">
        <div class="form-group col-md-4">
            <label class="control-label" for="country">{{ __('Country') }}</label>
            <input type="text" class="form-control" name="country" value="{{ $profile->country }}" required>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" for="state">{{ __('State') }}</label>
            <input type="text" class="form-control" name="state" value="{{ $profile->state }}" required>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" for="lga">{{ __('Local Govt/City/Town') }}</label>
            <input type="text" class="form-control" name="lga" value="{{ $profile->lga }}" required>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('Birthday') }}</label>
            <input type="date" class="form-control" name="birthday" max="@php echo date('Y-m-d'); @endphp" value="{{ $profile->birthday }}" required>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('Religion') }}</label>
            <select name="religion" class="form-control nice-select wide" value="{{ $profile->religion }}" required>
                <option value="{{ $profile->religion }}">{{ $profile->religion }}</option>
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
            <select id="marital_status" name="marital_status" class="form-control nice-select wide" value="{{ $profile->marital_status }}" required>
                <option value="{{ $profile->marital_status }}">{{ $profile->marital_status }}</option>
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
            <input id="qualification" type="text" class="form-control" name="qualification" value="{{ $profile->qualification }}">
        </div>
        <div class="col-md-4">
            <label for="permanent_address" class="control-label">{{ __('Home Address') }}</label>
            <input id="permanent_address" type="text" class="form-control" name="permanent_address" value="{{ $profile->permanent_address }}" required>
        </div>
        <div class="col-md-4">
            <label for="current_address" class="control-label">{{ __('Home Address 2') }} <span><small class="text-danger">ignore if same address</small></span></label>
            <input id="current_address" type="text" class="form-control" name="current_address" value="{{ $profile->current_address }}">
        </div>
        <div class="col-md-4">
            <label for="contract_type" class="control-label">{{ __('Type') }}</label>
            <select id="contract_type" name="contract_type" class="form-control nice-select wide" value="{{ $profile->contract_type }}" required>
                <option value="{{ $profile->contract_type }}">{{ $profile->contract_type }}</option>
                <option @if (old('FT')=='FT' ) selected @endif value="FT">Full Time</option>
                <option @if (old('PT')=='PT' ) selected @endif value="PT">Part Time</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="portfolio_url" class="control-label">{{ __('Portfolio Url') }}</label>
            <input id="portfolio_url" type="url" class="form-control" name="portfolio_url" value="{{ $profile->portfolio_url }}" placeholder="https://example.com">
        </div>
        <div class="col-md-4">
            <label for="facebook_url" class="control-label">{{ __('Facebook Url') }}</label>
            <input id="facebook_url" type="url" class="form-control" name="facebook_url" value="{{ $profile->facebook_url }}" placeholder="https://example.com">
        </div>
        <div class="col-md-4">
            <label for="instagram_url" class="control-label">{{ __('Instagram Url') }}</label>
            <input id="instagram_url" type="url" class="form-control" name="instagram_url" value="{{ $profile->instagram_url }}" placeholder="https://example.com">
        </div>
        <div class="col-md-4">
            <label for="twitter_url" class="control-label">{{ __('X Url') }}</label>
            <input id="twitter_url" type="url" class="form-control" name="twitter_url" value="{{ $profile->twitter_url }}" placeholder="https://example.com">
        </div>
        <div class="col-md-4">
            <label for="about" class="control-label">{{ __('About') }}</label>
            <input id="about" type="text" class="form-control" name="about" value="{{ $profile->about }}">
        </div>
    </div>
    <div class="card-footer mt-2">
        <p class="lead">{{ __('USER INFORMATION') }}</p>
    </div>
    <div class="row mb-3">
        <?php $user = Auth::user(); ?>
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('First Name') }}</label>
            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required disabled>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('Middle Name') }}</label>
            <input type="text" class="form-control" name="other_name" value="{{ $user->other_name }}" disabled>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label">{{ __('Surname') }}</label>
            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" disabled required>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm float-end">{{ __('Submit Application') }}</button>
    </div>
</form>
