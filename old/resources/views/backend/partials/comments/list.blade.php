<ul>
    @foreach ($collection as $comment)
    <span style="color: red;">{{ $comment->comment }}</span>
    @include ('backend.partials.comments.comment')
    @endforeach
</ul>