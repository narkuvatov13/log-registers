<x-admin-master>
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-2">

                </div>
                <div class="col-8">
                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Content</label>
                            <input type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entry Post Content">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Dosya Seciniz</label>
                            <input type="file" name="img" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">Olustur</button>
                    </form>
                </div>
                <div class="col-2">

                </div>

            </div>
        </div>
    @endsection
</x-admin-master>
