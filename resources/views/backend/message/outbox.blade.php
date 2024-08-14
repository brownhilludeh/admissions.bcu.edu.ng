@extends('layouts.backend')
@section('title', 'Message Outbox')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card custom-card">
            <div class="card-header">
                <span class="card-title">
                    {{__('Send Items')}}
                </span>
                <a href="{{ route('msg_compose') }}" class="btn btn-primary btn-sm ajax-modal">{{__('New Message')}}</a>
            </div>
            <div class="card-body no-export">
                <table class="table table-bordered">
                    <thead>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Receiver') }}</th>
                        <th>{{ __('Subject') }}</th>
                        <th>{{ __('View') }}</th>
                    </thead>
                    <tbody>
                        @foreach($messages as $data)
                        <tr>
                            <td>{{ date('d/m/y - H:m', strtotime($data->date)) }}</td>
                            <td>{{ $data->receiver }}</td>
                            <td>{{ $data->subject }}</td>
                            <td><a href="{{ route('show_outbox', $data->id) }}" data-title="{{ __('View Message') }}" class="btn btn-primary btn-sm ajax-modal">{{ __('View') }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pull-right">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
