@component('mail::message')
# Hello {{ $name }},
You have requested a new password for you account. We have updated your password.
User this new password for login. You can change the password in your profile settings.

@lang('emails.request-approved.subject')

## New Password
@component('mail::panel')
**{{ $password }}**
@endcomponent

Thanks,
### {{ config('app.name') }}
@endcomponent
