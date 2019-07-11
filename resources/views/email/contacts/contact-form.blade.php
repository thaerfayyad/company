@component('mail::message')
 #thanks you for your messages
    <strong>Name</strong> {{$data['name']}}
    <strong>Email</strong> {{$data['email']}}
    <strong>Message</strong>
    {{$data['message']}}
@endcomponent
