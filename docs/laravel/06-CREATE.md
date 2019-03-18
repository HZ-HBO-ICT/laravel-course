CREATE
======

Met een Create willen we een of meerdere rijen in een tabel creëren door middel van een formulier. Om dit creëren mogelijk te maken in de MVC structuur van Laravel moeten we de volgende aspecten invullen: database, route, model, controller en view.

Database
--------

In Laravel creëer je een database in een migration. Dit is een php bestand waarin staat wat je met de database wilt doen. Je creëert een migratie door het volgende commando.

```c
php artisan make:migration create_assignments_table
```

In dit geval is dit een ‘assignments’ tabel. Wanneer je navigeert naar de map `/databases/migrations/{datum-en-tijdstip}\create\_assignments\_table` zie je dat er een migratie is aangemaakt. Je moet daar nog de juiste velden/kolommen (zie <https://laravel.com/docs/5.8/migrations>) toevoegen die voor jouw tabel van belang zijn. Let op dat je meervoud gebruikt.

```php
public function up()
  {
    Schema::create('assignments', function (Blueprint $table) {
      $table->increments('id');
      $table->string('project_name');
      $table->string('image_url');
      $table->text('description');
      $table->timestamps();
  });
}
```

De functie ‘up’ in de migratie zorgt er voor dat er een assignments tabel in je database wordt gecreëerd. Nu moet je de migratie nog wel uitvoeren. Dat doe je door het commando

```c
php artisan migrate
```

**Route**
---------

In het geval van een create zijn er 2 routes nodig. De routes worden aangemaakt in `/routes/web.php`.

**1\. route voor tonen formulier**

Wanneer je een nieuwe resource wilt creëren gebeurt dit vaak met een formulier. Je moet dus eerst een route maken voor dit formulier. Je kan het formulier dus ook als een resource zien.

```c
Route::get('/assignments/create', 'AssignmentsController@create');
```

**2\. route voor verwerken formulier**

Wanneer het formulier is verkregen dan wordt dit ingevuld en wordt er op versturen geklikt. In dit geval wordt de data uit het formulier naar een route verstuurd.

```c
Route::post('/assignments', 'AssignmentsController@store');
```

In dit geval zie je dat er gebruik wordt gemaakt van de actie ‘post’. Die actie wordt ook in de route meegenomen zodat de route weet welke actie er moeten worden uitgevoerd op die bepaalde resource. Je ziet ook dat er naar een zelfde ‘AssignmentsController’ wordt verwezen maar dan wel naar een aparte functie (`@create` en `@store`).

Model
-----

Een model is verantwoordelijk voor de relatie met een tabel uit de database. Waarbij de database tabel in het meervoud staat, is het model enkelvoud.

Controller
----------

Een controller is verantwoordelijk voor het verwerken van de route en via het model bevragen of manipuleren van de database. Het generen van een controller en model kan door middel van 1 enkel artisan commando.

```c
php artisan make:controller AssignmentsController -r -m Assignment
```

In dit commando wordt een AssignmentsController gemaakt. Let op dat dit weer meervoud is. De toevoeging -r zorgt er voor dat er verschillende functies in de controller worden aangemaakt die met de resource Assignments samenhangt. de -m Assignment toevoeging zorgt er voor dat er tevens een model Assignment (let op enkelvoud) wordt gemaakt. De controller vind je in `/app/Http/Controller` het model vind je in `/app`.

```php
public function create()
{
  return view('assignments.create');
}
```

In de eerste route wordt de functie create van de AssignmentsController aangroepen. Deze create functie geeft alleen de view assignments.create terug. In dit geval staat assignments voor de map waarin een create.blade.php file is opgenomen. Dit is een shorthand notatie.

```php
use \App\Assignment;

public function store()
{
  $assignment = new Assignment();

  $assignment->project_name = request('projectNameInput');
  $assignment->image_url = request('imageUrlInput');
  $assignment->description = request('projectDescriptionTextArea');
  $assignment->save();

  return redirect('/assignments');
}
```

In de tweede route wordt de functie store van de AssignmentsController aangeroepen. Deze functie maakt eerst een nieuwe object Assignment aan. Dit doet hij op basis van het model Assignment. Vervolgens worden er een aantal attributen toegevoegd aan dit object die overeenkomen met de kolommen in de tabel Assignments. De waarden die worden toegekend aan deze attributen komen uit het formulier en worden meegegeven aan het request. Als laatste wordt er een redirect uitgevoerd en wordt er verwezen naar een bestaande route.

View
----

De controller retourneert een view naar de browser. In eerste instantie wordt het create formulier getoond. Het is een goed gebruik om voor een resource een aparte map aan te maken. In dit geval de map assignments. In deze map komen dan de views te staan die bij assignments horen. We beginnen met create.blade.php

```php
@extends('./layout/layout')

@section('title', 'Create Assignment')

@section('content')

    <h1>Create an assignment</h1>
    
    <form method="POST" action={{ url("/assignments") }}>
        
        {{ csrf_field() }}

        <div class="form-group">
          <label for="projectNameInput">Project name</label>
          <input type="text" class="form-control" id="projectNameInput" name="projectNameInput" placeholder="insert your project name">
        </div>
        <div class="form-group">
            <label for="imageUrlInput">Project Image</label>
            <input type="text" class="form-control" id="imageUrlInput" name="imageUrlInput" placeholder="insert your project image url">
          </div>
        <div class="form-group">
          <label for="projectDescriptionTextArea">Project description</label>
          <textarea class="form-control" id="projectDescriptionTextArea" name="projectDescriptionTextArea" rows="4"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary mb-2">Submit</button>
        </div>
      </form>

@endsection
```

In deze view wordt een formulier opgebouwd. We maken daarbij gebruik van bootcamp 4\. Let op dat je wel ‘name' attributen toevoegt aan de input tags. Deze name attributen worden door het request verzonden naar de controller.

Let ook op het csrf\_field op regel 11\. Deze moet worden meegestuurd naar de server ivm security (<https://laravel.com/docs/5.8/csrf>).

Een ander interessant punt is `method=“POST”` en `action={{ url("/assignments") }}`. Hier staat dat het formulier (wanneer er op verzenden is geklikt) verzonden moet worden met een POST method naar de route '/assignments'. Daar hadden we zelf al een controller voor gemaakt en daardoor kan de data worden opgevangen door deze route en worden verwerkt in de databse.
