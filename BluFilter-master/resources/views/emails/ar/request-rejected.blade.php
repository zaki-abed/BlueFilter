@component('mail::message')
    # مرحبا {{ $name }},
    تم رفض طلبك لمزود الخدمة

    شكرا,
    ## {{ config('app.name') }}
@endcomponent
