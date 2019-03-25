DELETE
======

Met een DELETE willen we een rij uit een tabel verwijderen. Om dit in Laravel mogelijk te maken moeten we het volgende aanpassen: Route, Model, Controller en View

Route 
------

In dit geval is er 1 route nodig naar een specifieke resource.

```php
Route::delete('assignments/{assignment}', 'AssignmentsController@destroy');
```

Als method met de Route is `delete` meegegeven. Wanneer deze method wordt meegegeven aan deze resource wordt de functie `destroy` in de controller uitgevoerd.

Model
-----

Het model is gemaakt en behoeft niet te worden aangepast.

Controller
----------

In de controlle wordt de functie `destroy` gemaakt of ingevuld.

```php
public function destroy($id)
{
  Assignment::findOrFail($id)->delete();
  return redirect('/assignments');
}
```

In deze functie wordt een specifieke rij gezocht. Het id van deze rij wordt meegegeven aan de route en in deze functie opgevangen door middel van de parameter `$id`. Vervolgens wordt er op de rij met het id een delete uitgevoerd.

View
----

De edit view wordt aangevuld met een delete formulier.

```php
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
      
      <form method="POST" action="{{ url("/assignments/$assignment->id") }}">

        <!-- blade derective -->
        {{-- @method('DELETE')
        @csrf --}}

        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <div class="form-group">
          <button type="button" class="form-control btn btn-danger mb-2">Delete</button>
      </div>
      </form>

@endsection
```

In dit geval gaat het om het tweede formulier. In dit formulier verwijst het `action` attribuut naar een route met een specifieke resource. Wanneer er op het delete button is geklikt wordt die route geladen. Als method aan deze route wordt een `POST` meegegeven. Dit komt omdat een browser nog geen `DELETE` methode ondersteunt. Tocht wordt er een `DELETE` methode meegegeven door `{{ method\_field(‘DELETE’) }}.