@component('mail::message')
# POsted liked

{{ $liker->name }} X liked your post

@component('mail::button', ['url' => route('posts.show', $post)''])
    view post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
