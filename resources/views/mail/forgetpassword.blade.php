@component('mail::message')
Hello {{$user->name}},

<p>We are so sorry that you forgot your password.</p>
<span>But don't worry, we will help you right now.</span>

@component('mail::button', ['url' => url('reset', $user->remember_token)])
Reset Password
@endcomponent

<p>If you encounter any problems, please don't hesitate to contact us.</p>

{{ config('app.name') }}
@endcomponent
