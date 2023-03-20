@component('mail::message')
# {{$data['heading']}}

{{$data['msg']}}

@component('mail::button', ['url' => $data['link']])
{{$data['btn_text']}}
@endcomponent

@component('mail::panel')
{{$data['footer']}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
