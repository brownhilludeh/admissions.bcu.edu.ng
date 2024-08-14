@extends('layouts.backend')
@section('title', 'Applicant Status Update')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ $applicant->user->last_name }}'s {{ __('Result') }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('applicants.update', $applicant->id) }}" autocomplete="on" class="form-horizontal validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="col-md-4">
                            <label for="decision" class="control-label">{{ __('Decision/Status') }}</label>
                            <select id="decision" name="decision" class="form-control select2" required>
                                <option value="{{ $applicant->decision }}">{{ $applicant->decision }}</option>
                                <option @if (old('decision')=='Invalid Application' ) selected @endif value="Invalid Application">Invalid Application</option>
                                <option @if (old('decision')=='In Progress' ) selected @endif value="In Progress">In Progress</option>
                                <option @if (old('decision')=='Action Required' ) selected @endif value="Action Required">Action Required</option>
                                <option @if (old('decision')=='Admission Proposed' ) selected @endif value="Admission Proposed">Admission Proposed</option>
                                <option @if (old('decision')=='Accepted/Admited' )selected @endif value="Accepted/Admited">Accepted/Admited</option>
                                <option @if (old('decision')=='Admission Declined' )selected @endif value="Admission Declined">Admission Declined</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label for="comment" class="control-label">{{ __('Comment/Note') }}</label>
                            <input type="text" class="form-control" name="comment" value="{{ $applicant->comment }}" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary btn-sm">{{ __('Update Status') }}</button>
                    </div>

                    <div class="card-footer mt-2">
                        <p class="lead">{{ __('View' ) }} {{ $applicant->user->last_name }}'s {{ __('documents' ) }}</p>
                    </div>
                    <div class="row ">
                        <div class="col-12 setting-tab">
                            <a href="{{ asset('uploads/files/results/'.$applicant->jamb_result) }}" target="_blank" class="btn btn-primary btn-sm">{{ __('View UTME Result') }}</a>
                            <a href="{{ asset('uploads/files/results/'.$applicant->o_level_1) }}" target="_blank" class="btn btn-primary btn-sm">{{ __('View O level') }}</a>
                            @if ($applicant->o_level_2 != '')
                            <a href="{{ asset('uploads/files/results/'.$applicant->o_level_2) }}" target="_blank" class="btn btn-primary btn-sm">{{ __('View 2nd Sitting') }}</a>
                            @endif
                            @if ($applicant->birth_certificate != '')
                            <a href="{{ asset('uploads/files/results/'.$applicant->birth_certificate) }}" target="_blank" class="btn btn-primary btn-sm">{{ __('View Birth Certificate') }}</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
