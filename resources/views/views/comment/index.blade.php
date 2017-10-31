<div class="col-md-3">
    <h3>{{ $comment->author }}</h3>
    <p>{{ $comment->created_at->format('d.m.Y H:i:s') }}</p>
    <p>{{ $comment->content }}</p>
</div>