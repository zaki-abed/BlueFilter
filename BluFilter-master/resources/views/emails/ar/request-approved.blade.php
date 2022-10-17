@component('mail::message')
    # مرحبا {{ $name }},
    تمت الموافقة على طلبك لمزود الخدمة

    شكرا,
    ## {{ config('app.name') }}
@endcomponent
