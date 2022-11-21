<li>
<h3>{{ $comment->owner->name }} said...</h3>
@if (isset($comments[$comment->id]))
        @include ('backend.partials.comments.list', ['collection' => $comments[$comment->id]])
@endif
</li>