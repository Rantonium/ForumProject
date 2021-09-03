@component('mail::message')
    {{ $reply->author()->name() }} replied to this thread

    @component('mail::panel')
        {{ $reply->excerpt(250) }}
    @endcomponent

    @component('mail::button', ['url' => route('threads.show', ['channel' => $reply->replyAble()->channel->slug(), 'thread' => $reply->replyAble()->slug()])])
        This is the thread
    @endcomponent

    Snap back to reality
    There goes sanity
@endcomponent
