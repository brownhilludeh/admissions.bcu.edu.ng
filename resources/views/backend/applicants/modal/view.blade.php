<div class="card custom-card">
    <div class="card-body">
        <div class="row">
            <a href="{{ asset('uploads/files/results/'.$applicant->jamb_result) }}" target="_blank">{{ __('UTME Result') }}</a>
            <a href="{{ asset('uploads/files/results/'.$applicant->o_level_1) }}" target="_blank">{{ __('O level') }}</a>
            <a href="{{ asset('uploads/files/results/'.$applicant->o_level_2) }}" target="_blank">{{ __('2nd Sitting') }}</a>
            <a href="{{ asset('uploads/files/results/'.$applicant->birth_certificate) }}" target="_blank">{{ __('Birth Certificate') }}</a>
        </div>
    </div>
</div>
