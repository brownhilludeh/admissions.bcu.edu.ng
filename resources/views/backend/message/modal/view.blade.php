<div class="card custom-card">
    <div class="card-body">
        <small class="mb-2">{{ __("Date ") }} : {{ date('d-M-Y', strtotime($message->date)) }} ({{ date('H:m', strtotime($message->date)) }}hr)</small>
        <br>
        <h4 class="my-2 fw-bolder">{{ $message->subject }}</h4>

        <div class="panel-item">
            {!! $message->body !!}
        </div>
    </div>
</div>
