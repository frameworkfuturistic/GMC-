@component('mail::message')


@component('mail::panel')

<a href="{{ route('reset.password.get', $code) }}">Reset Password</a>
@endcomponent

<p>The allowed duration of the code is one hour from the time the message was sent</p>

@endcomponent