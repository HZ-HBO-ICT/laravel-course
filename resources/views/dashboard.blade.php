@extends('./layout/layout')

@section('title', 'Dashboard')

@section('content')

    <h1>All my results</h1>

    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope="col">Course</th>
                <th scope="col">Grade</th>
                <th scope="col">teacher</th>
                
            </tr>
        </thead>
       <tbody>
        @foreach ($results as $row)
            {{-- {{ var_dump($row) }} --}}
            <tr>

                <td>{{ $row["course"] }}</td>
                <td>{{ $row["grade"] }}</td>
                <td>{{ $row["teacher"] }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>


@endsection