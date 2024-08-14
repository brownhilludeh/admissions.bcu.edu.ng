@extends('layouts.backend')
@section('title', 'My applcation Index')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Admission Application') }}
                </div>
                @empty($apply->id)
                <a href="{{ route('my.application.edit', Auth::user()->id) }}" class="btn btn-success-gradient btn-sm "> {{ get_academic_year() }} {{ __('Admission Registration') }}</a>
                @else
                <a href="{{ route('my.application.show', Auth::user()->id) }}" class="btn btn-success-gradient btn-sm">{{ __('View Application Details') }}</a>
                @endempty
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover data-table">
                    <thead>
                        <tr>
                            <th>{{ __('Application Session') }}</th>
                            <th>{{ __('UTME Score') }}</th>
                            <th>{{ __('Programme') }}</th>
                            <th>{{ __('College') }}</th>
                            <th>{{ __('O-Level') }}</th>
                            <th>{{ __('Decision') }}</th>
                            <th>{{ __('Comment') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $current = get_option('academic_year'); @endphp
                        @foreach ($applications as $application)
                        <tr>
                            <td>{{ $application->year }} {{ $application->session_id == $current ? '(Active)' : '' }}</td>
                            <td>{{$application->jamb_score }}</td>
                            <td>{{$application->programme }}</td>
                            <td>{{ $application->college}}</td>
                            <td>{{ $application->o_level_reg_1}} <br> {{ $application->o_level_reg_2}} </td>
                            <td> {{ $application->decision }} </td>
                            <td> {{ $application->comment }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
