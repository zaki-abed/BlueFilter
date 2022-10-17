@component('mail::message')
# Hi {{ $name }}

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
