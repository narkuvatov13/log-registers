<x-admin-master>
    @section('content')
            <div class="container">
                <h1>Hosgeldiniz {{auth()->user()->name}}</h1>
            </div>
    @endsection
</x-admin-master>
