@extends('./layout/layout')

@section('title', 'Create Posts')

@section('content')

    <h1>Create a Post</h1>
    
    <form method="POST" action={{ url("/posts") }}>
        
        {{ csrf_field() }}

        <div class="form-group">
          <label for="projectNameInput">Post title</label>
          <input type="text" class="form-control" id="projectNameInput" name="post-title" placeholder="insert your project name">
        </div>
        <div class="form-group">
            <label for="imageUrlInput">Post photo</label>
            <input type="text" class="form-control" id="imageUrlInput" name="post-photo" placeholder="insert your project image url">
          </div>
        <div class="form-group">
          <label for="projectDescriptionTextArea">Post description</label>
          <textarea class="form-control" id="projectDescriptionTextArea" name="post-description" rows="4"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary mb-2">Submit</button>
        </div>
      </form>

@endsection