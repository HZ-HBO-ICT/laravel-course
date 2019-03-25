@extends('./layout/layout')

@section('title', 'Assignments')

@section('content')

    <h1>Assignment {{ $assignment->id }}</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{$assignment->image_url}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$assignment->project_name}} <a href="/assignments/{{ $assignment->id }}/edit">edit</a></h5>
                            <p class="card-text">
                                {{$assignment->description}}
                            </p>
                    </div>
                </div>
            </div>    
    </div>
@endsection