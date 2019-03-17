@extends('./layout/layout')

@section('title', 'Create Assignment')

@section('content')

    <h1>Edit an exsting assignment</h1>
    
        {{-- <form method="POST" action="/assignments/{{ $assignment->id }}"> --}}
        <form method="POST" action="{{ url("/assignments/$assignment->id") }}">
        
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group">
          <label for="projectNameInput">Project name</label>
        <input type="text" class="form-control" id="projectNameInput" name="projectNameInput" placeholder="insert your project name" value="{{ $assignment->project_name }}">
        </div>
        <div class="form-group">
            <label for="imageUrlInput">Project Image</label>
            <input type="text" class="form-control" id="imageUrlInput" name="imageUrlInput" placeholder="insert your project image url" value="{{ $assignment->image_url }}">
          </div>
        <div class="form-group">
          <label for="projectDescriptionTextArea">Project description</label>
          <textarea class="form-control" id="projectDescriptionTextArea" name="projectDescriptionTextArea" rows="4">{{ $assignment->description }}"</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary mb-2">Submit</button>
        </div>
      </form>

@endsection