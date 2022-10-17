@component('mail::message')
# Hello {{ $name }},
لقد طلبت كلمة مرور جديدة لحسابك. لقد قمنا بتحديث كلمة المرور الخاصة بك.
استخدم كلمة المرور الجديدة هذه لتسجيل الدخول. يمكنك تغيير كلمة المرور في إعدادات ملف التعريف الخاص بك.

@lang('emails.request-approved.subject')

## كلمة السر الجديدة
@component('mail::panel')
**{{ $password }}**
@endcomponent

شكرا,
### {{ config('app.name') }}
@endcomponent
