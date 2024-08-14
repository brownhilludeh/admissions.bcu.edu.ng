@extends('layouts.backend')
@section('title', 'Message Inbox')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card custom-card">
            <div class="card-header">
                <span class="card-title">
                    {{__('Inbox')}}
                </span>
                <a href="{{ url('message/compose') }}" class="btn btn-primary btn-sm">{{__('New Message')}}</a>
            </div>
            <div class="card-body ">
                <table class="table table-bordered table-striped no-export data-table">
                    <thead>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Sender') }}</th>
                        <th>{{ __('Subject') }}</th>
                        <th>{{ __('View') }}</th>
                    </thead>
                    <tbody>
                        @foreach($messages as $data)
                        <tr {{ $data->read =='n' ? "style=font-weight:500" : "" }}>
                            <td>{{ date('d/m/y - H:m', strtotime($data->date)) }}</td>
                            <td>{{ $data->sender }}</td>
                            <td>{{ $data->subject }}</td>
                            <td><a href="{{ route('show_inbox', $data->id) }}" data-title="{{ __('View Message') }}" class="btn btn-primary btn-sm ajax-modal">{{ __('View') }}</a></td>
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

@section('js-script')
<script>
    $(document).on('click', '.ajax-modal', function() {
		$(this).parent().parent().css("font-weight", "normal");
		var inbox_count = parseInt($(".inbox-count").html());
		if (inbox_count == 1) {
			$(".inbox-count").remove();
		} else {
			$(".inbox-count").html(inbox_count - 1);
		}

	});
</script>
@stop
