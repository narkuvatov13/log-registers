<x-admin-master>
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-2">

                </div>
                <div class="col-8">
                    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Title</label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Content</label>
                            <input type="text" name="content" value="{{$post->content}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        </div>
                        <div class="form-group">
                            <img src="{{asset('storage/'.$post->img)}}" alt="" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Dosya Seciniz</label>
                            <input type="file" name="img" value="{{$post->img}}" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
                <div class="col-2">

                </div>

            </div>
        </div>
    @endsection
</x-admin-master>
