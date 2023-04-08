<table class="table mt-4">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Comment</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @if($comments)
        @foreach($comments as $comment)
        <tr>
            <td>{{$comment['id']}}</td>
            <td>{{$comment['body']}}</td>
            <td>{{\Carbon\Carbon::parse($comment->created_at)->format('Y-m-d')}}</td>
            <td>

                <a href="{{ route('comments.edit', $comment['id']) }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('comments.destroy', $comment['id']) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn  btn-danger "
                            title='Delete'>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
   @endif
    </tbody>
</table>
