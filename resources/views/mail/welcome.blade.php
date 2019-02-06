@component('mail::message')
# Welcome, {{ $name }}!

Welcome to Orient War Room. Please use the following credentials to log-in.

Username : {{ $data['username'] }} <br>
Password : {{ $data['password'] }}

@component('mail::button', ['url' => 'http://www.enfection.com/projects/warr/public/'])
Login
@endcomponent

Have a Great Day,<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent

