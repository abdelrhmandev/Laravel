@component('mail::message')
<p>{{ trans('user.reset_account_password') }}</p>

{{ trans('admin.welcome')  }} , <b> {{ $data['data']->email }} </b><br>


@component('mail::button', ['color'=>'green','url' => route('admin.auth.password.update',$data['token'].'?email='.$data['data']->email)])
{{ trans('user.reset_account_password') }}<br>
@endcomponent

<p>{{ trans('admin.reset_password_expire') }}</p>

{{ trans('admin.best_regards') }} <br>
{{ config('admin.webapp') }}
@endcomponent
