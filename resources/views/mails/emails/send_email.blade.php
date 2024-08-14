<x-mail::message>
{{-- #{{ $content->subject }} --}}
<br>
{!! $content->message !!}

{{ __('Best regards,') }}
<br>
{{ get_option('school_name') }}  
</x-mail::message>
