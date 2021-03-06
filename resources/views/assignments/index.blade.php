@extends('./layout/layout')

@section('title', 'Assignments')

@section('content')

    <h1>All my assignments</h1>
    <div class="row">
        @foreach ($assignments as $row)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{$row->image_url}}" alt="">
                    <div class="card-body">
                    <h5 class="card-title"><a href="/assignments/{{ $row->id }}">{{$row->project_name}}</a></h5>
                            <p class="card-text">
                                {{$row->description}}
                            </p>
                            <p>Days of work: {{ $row->numberOfDays()->days }}</p>
                    </div>
                </div>
            </div>    
        @endforeach
    </div>
@endsection