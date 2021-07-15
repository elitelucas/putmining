@component('mail::message')
{!! $mailcontent !!}

@component('mail::button', ['url' => url('email-passwordreset/'.$user->passwordreset_link)])
Reset Password
@endcomponent

Sincerely,<br>
PutMining.com
@endcomponent
