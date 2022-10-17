@component('mail::message')
    # Hello {{ $name }},
    Your request for service provider has been rejected

    Thanks,
    ## {{ config('app.name') }}
@endcomponent
