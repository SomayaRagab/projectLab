<div class="form-floating my-2">
    <form method="post" action="{{ route('comments.store') }}">
        @csrf  @method('POST')
        <textarea class="form-control" placeholder="Leave a comment here" name="body" style="height: 100px"></textarea>
        <input class="form-control"  name="user_id" value="1" style="display: none">
        <input class="form-control"  name="post_id" value="{{$post->id}}" style="display: none">
        <div class="float-right">
            <button class="btn btn-primary m-2">Add Comment</button>
        </div>
    </form>
</div>
