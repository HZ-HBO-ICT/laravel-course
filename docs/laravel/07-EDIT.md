EDIT
====

Met een EDIT willen we een of meerdere velden (kolommen) in de rij uit een tabel aanpassen. Om dit in Laravel mogelijk te maken moeten we het volgende aanpassen: Route, Model, Controller en View

**Route**
---------

In het geval van een create zijn er 2 routes nodig. De routes worden aangemaakt in /routes/web.php.

**1\. route voor tonen formulier**

Wanneer je een resource wilt aanpassen moet je eerst de gegevens van die resource uit een tabel halen (via het Model) en dan tonen in een view.

```c
Route::get('/assignments/{assignment}/edit', 'AssignmentsController@edit');
```

**2\. route voor verwerken formulier**

Wanneer het formulier is verkregen dan worden elementen aangepast en wordt er op versturen geklikt. In dit geval wordt de data uit het formulier naar een route verstuurd.

```c
Route::patch('/assignments/{assignment}', 'AssignmentsController@update');
```

In dit geval wordt een method ‘patch’ verwacht in de route. Wanneer de method ‘patch' wordt meegegeven aan deze resource dan wordt de functie ‘update' in de controller pas uitgevoerd. Let ook op `{assignment}`. Dit is een wildcard. In deze route moet de exacte resource worden meegegeven. Vaak is dit een `id`. Dit `id` wordt dan gebruikt om de exacte resource in de tabel op te zoeken. Voorbeeld van een concrete route.

```c
localhost:8888/assisgnments/1
```

Model
-----

Het model is in een eerder stadium al aangemaakt en hoeft in dit geval niet te worden aangepast.

Controller
----------

Een controller is verantwoordelijk voor het verwerken van de route en via het model bevragen of manipuleren van de tabel. De controller is in dit geval al eerder aangemaakt, maar er moeten wel 2 functies worden toegevoegd, de functie edit en de functie update.

```php
public function edit($id)
{
  $assignment = Assignment::find($id);
  return view('assignments.edit', compact('assignment'));
}
```

In deze functie wordt eerst op basis van de aangegeven `$id` in de route een assignment gevonden in de tabel. Wanneert die is gevonden dan wordt deze doorgegeven aan de view.



```php
public function update($id)
{

  $assignment = Assignment::find($id);

  $assignment->project_name = request('projectNameInput');
  $assignment->image_url = request('imageUrlInput');
  $assignment->description = request('projectDescriptionTextArea');
        
  $assignment->save();

  return redirect('/assignments');

}
```

Deze functie lijkt heel erg veel op de store functie uit CREATE. Het grote verschil bestaat er uit dat er nu een specifieke resource (verkregen door het `$id`) wordt aangepast.

View
----

In de eerste route wordt er verwezen naar het edit-formulier. In dit editformulier wordt de opgehaalde gegevens uit de database verwerkt.

```c
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
```

Wat opvalt in het formulier is dat de method in de kop van het formulier `\<form method=“POST” …\>` een POST method is. Terwijl de route een ‘PATCH’ method verwacht. Dit komt omdat in de browser deze verschillende methods nog niet zijn geïmplementeerd. In Laravel wordt dit opgelost door `{{ method\_field(‘PATCH') }}` aan het formulier toe te voegen. Dit creëert een hidden field in het formulier en die wordt weer opgepakt door het Laravel framework.