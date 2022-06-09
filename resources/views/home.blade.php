<x-home-master>
    @section('content')
        <!-- Blog Post -->
        @foreach($posts as $post)
            <div class="card mb-4">
                <img class="card-img-top" src="{{asset('storage/'.$post->img)}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2022 by
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>
        @endforeach
    @endsection
</x-home-master>
