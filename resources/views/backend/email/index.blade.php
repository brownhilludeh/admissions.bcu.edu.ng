@extends('layouts.backend')
@section('title', 'Emails Logs')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card custom-card ">
            <div class="card-header">
                <div class="card-title">
                    {{__('Email Log')}}
                </div>
                <a href="{{ route('emails.create') }}" class="btn btn-primary btn-sm">{{__('Compose')}}</a>
            </div>
            <div class="card-body no-export">
                <table class="table table-bordered">
                    <thead>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Subject') }}</th>
                        <th>{{ __('Message') }}</th>
                        <th>{{ __('Sender') }}</th>
                        <th>{{ __('Action') }}</th>
                    </thead>
                    <tbody>
                        @foreach($emailLogs as $emailLog)
                        <tr>
                            <td><small class="mb-2">{{ date('d-m-y', strtotime($emailLog->created_at)) }} ({{ date('H:m', strtotime($emailLog->created_at)) }}hr)</small></td>
                            <td>{{ $emailLog->receiver_email }}</td>
                            <td>{{ $emailLog->subject }}</td>
                            <td class="text-truncate" style="max-width: 15rem;">{!! $emailLog->message !!}</td>
                            {{-- <td> <a href="{{ route('emails.show', $emailLog->id) }}" class="ajax-modall btn btn-sm btn-main"> view</a> </td> --}}
                            <td>{{ $emailLog->sender }}</td>
                            <td>
                                <a href="{{ route('emails.show', $emailLog['id']) }}" data-title="{{ __('View Email') }}" class="ajax-modall btn btn-sm btn-primary-light">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                                <a href="{{ route('emails.destroy', $emailLog->id) }}" class="btn btn-sm btn-danger-light">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
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
