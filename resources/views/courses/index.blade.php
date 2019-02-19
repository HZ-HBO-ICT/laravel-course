@extends('./layout/layout')

@section('title', 'Courses')

@section('content')

    <h1>All my results</h1>

    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope="col">Course</th>
                <th scope="col">Grade</th>
                <th scope="col">Teacher</th>
                
            </tr>
        </thead>
       <tbody>
        @foreach ($courses as $row)
            {{-- {{ var_dump($row) }} --}}
            <tr>

                <td>{{ $row->name }}</td>
                <td>{{ $row->grade }}</td>
                <td>{{ $row->teacher }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection