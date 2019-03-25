@component('mail::message')
# Newsletter Subscription

Hi, am {{ data['email'] }} I would like to receive Your newsletters.

@component('mail::button', ['url' => ''])
Visit site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
