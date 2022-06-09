<x-admin-master>
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-2">

                </div>
                <div class="col-8">
                    @if(Session::has('message-post-create'))
                        <div class="alert alert-success">{{Session::get('message-post-create')}}</div>
                    @endif
                    @if(Session::has('message-post-update'))
                        <div class="alert alert-success">{{Session::get('message-post-update')}}</div>
                    @endif
                    @if(Session::has('message-post-destroy'))
                        <div class="alert alert-success">{{Session::get('message-post-destroy')}}</div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Create Date</th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{Str::limit($post->content,'10',' . . .')}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td><a href="{{route('post.edit',$post->id)}}" class="btn btn-success">Edit</a></td>
                                    @if(auth()->user()->admin_Mi == 1)
                                        <td>
                                        <form action="{{route('post.destroy',$post->id)}}" method='post'>
                                            @csrf
                                            @method('delete')
                                            <button type="sumbit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    @endif
                                    @if(auth()->user()->admin_Mi != 1)
                                        <td>
                                            <button  class="btn btn-danger disabled">Delete</button>
                                        </td>
                                    @endif

                                </tr>
                        @endforeach

                        </tbody>
                    </table>                </div>
                <div class="col-2">

                </div>

            </div>
        </div>
    @endsection
</x-admin-master>
