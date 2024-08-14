<div class="card custom-card">
    <div class="card-body">
        <small class="mb-2">{{ __("Date ") }} : {{ date('d-M-Y', strtotime($emailLog->created_at)) }} ({{ date('H:m', strtotime($emailLog->created_at)) }}hr)</small>
        <br>
        <h4 class="my-2 fw-bolder">{{ $emailLog->subject }}</h4>
        <h4 class="my-2 fw-bolder">{{ $emailLog->receiver_email }}</h4>

        <div class="panel-item">
            {!! $emailLog->message !!}
        </div>
    </div>
</div>
