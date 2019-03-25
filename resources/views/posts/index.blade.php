@extends('./layout/layout')

@section('title', 'Assignments')

@section('content')

    <h1>All my posts</h1>
    <div class="row">
        @foreach ($posts as $row)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{$row->intro_photo}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$row->title}}</h5>
                            <p class="card-text">
                                {{$row->description}}
                            </p>
                    </div>
                </div>
            </div>    
        @endforeach
    </div>
@endsection