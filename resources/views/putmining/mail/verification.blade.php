@component('mail::message')
{!! $mailcontent !!}

@component('mail::button', ['url' => url('email-verify/'.$user->verify_link)])
Verify Email
@endcomponent

Sincerely,<br>
PutMining.com
@endcomponent