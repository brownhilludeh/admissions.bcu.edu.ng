@extends('layouts.backend')
@section('title', 'Applicant Index')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Applicant Table') }}
                </div>
                <select class="custom-select nice-select" id="year" onchange="showYear(this);">
                    <option value=""> {{ __('Select Session') }} </option>
                    {{ create_option('academic_years', 'id', 'year', $year) }}
                </select>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover data-table">
                    <thead>
                        <tr>
                            <th>{{ __('S/N') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Course') }}</th>
                            <th>{{ __('UTME Score') }}</th>
                            <th>{{ __('UTME') }}</th>
                            <th>{{ __('Results') }}</th>
                            <th>{{ __('Decision') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $current = get_option('academic_year'); @endphp
                        <?php $no = 1; ?>
                        @foreach ($applicants as $applicant)
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $applicant->last_name}}, {{ $applicant->first_name}} {{ $applicant->other_name}}</td>
                            <td>{{ $applicant->programme}}</td>
                            <td>{{ $applicant->jamb_score}}</td>
                            <td>{{ $applicant->jamb_reg_no}}</td>
                            <td>
                                <a href="{{ asset('uploads/files/results/'.$applicant->jamb_result) }}" target="_blank">{{ __('UTME Result') }}</a><br>
                                <a href="{{ asset('uploads/files/results/'.$applicant->o_level_1) }}" target="_blank">{{ __('O level') }}</a><br>
                                @if ($applicant->o_level_2 != '')
                                <a href="{{ asset('uploads/files/results/'.$applicant->o_level_2) }}" target="_blank">{{ __('2nd Sitting') }}</a><br>
                                @endif
                                @if ($applicant->birth_certificate != '')
                                <a href="{{ asset('uploads/files/results/'.$applicant->birth_certificate) }}" target="_blank">{{ __('Birth Certificate') }}</a><br>
                                @endif

                                {{-- <a href="{{ route('applicants.show', $applicant->id) }}" class="ajax-modal btn-link" data-title="{{ $applicant->user->last_name }}'s {{ __('Result') }}">{{ __('View All')}}</a>--}}
                            </td>
                            <td>{{ $applicant->decision}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                                        Action
                                    </a>
                                    <ul class="dropdown-menu text-center p-2">
                                        {{-- <li class="mb-2">
                                            <a href="{{ route('applicants.show', $applicant['id']) }}" data-title="{{ __('View Academic Year') }}" class="btn btn-success btn-sm ajax-modal">
                                                {{ __('Update' . ' '. $applicant->last_name . "'s " . 'status') }}
                                            </a>
                                        </li> --}}
                                        <li class="mb-2">
                                            <a href="{{ route('applicants.edit', $applicant['id']) }}" data-title="{{ __('Update Academic Year') }}" class="btn btn-success btn-sm ajax-modal">
                                                {{ __('Update') }}
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <form action="{{ route('applicants.destroy', $applicant['id']) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm btn-archive">
                                                    {{ __('Archived') }}
                                                </button>
                                            </form>
                                        </li>
                                        @if (Auth::user()->user_type == 'SuperAdmin')
                                        <li class="mb-2">
                                            <form action="{{ route('applicants.delete', $applicant['id']) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger-light btn-sm btn-delete">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-script')
<script>
    function showYear(elem) {
            if ($(elem).val() == "") {
                return;
            }
            window.location = "<?php echo url('applicants/year'); ?>/" + $(elem).val();
        }
</script>
@stop
