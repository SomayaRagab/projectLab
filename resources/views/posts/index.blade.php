@extends('layouts.app')

@section('title') Index @endsection

@section('content')
<div class="text-center">
    <a href="{{route('posts.create')}}"><button type="button" class="mt-4 btn btn-success">Create Post</button></a>
</div>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach($posts as $post)
        <tr>
            <td>{{$post['id']}}</td>
            <td>{{$post['title']}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{\Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}}</td>
            <td>
                <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info">View</a>
                <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('posts.destroy', $post['id']) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn  btn-danger "
                        title='Delete'>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{ $posts->links() }}
@endsection

@section('confirm')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('form').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
@endsection
