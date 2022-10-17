@component('mail::message')
    # Hello {{ $name }},
    Your request for service provider has been approved

    Thanks,
    ## {{ config('app.name') }}
@endcomponent
