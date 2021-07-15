@component('mail::message')
# Payment Made

Payment made by {{$user->email}}<br>
Pricing plan: {{$plan->price}}$/{{$plan->duration}}<br>
Paypal Payment ID: {{$payment_id}}

Sincerely,<br>
PutMining.com
@endcomponent
