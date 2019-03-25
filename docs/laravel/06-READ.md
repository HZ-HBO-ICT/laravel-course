READ
====

Met een **read **willen we 1 specifieke rij uit de tabel tonen.

Route
-----

```php
Route::get('/assignments/{assignment}', 'AssignmentsController@show');
```

In deze route met de method `get` verwijst `/assignment/{assignment}` naar een specifeke resource. Waarbij `{assignment}` de verwijzing is naar de specifieke resource. Vaak verwijst dit naar een `id` van een bepaalde rij in je tabel.

Model
-----

Het model is gemaakt en hoeft niet te worden aangepast.

Controller
----------

In de route wordt verwezen naar de functie show in de controller.

```php
public function show($id)
{
  $assignment = Assignment::findOrFail($id);
        
  return view('assignments.show', compact('assignment'));

}
```

In deze functie wordt de specifieke resoruce opgevangen als parameter (`$id`) van de functie show. Deze parameter wordt vervolgens gebruikt om de specifieke rij te zoeken in de tabel. Daarbij wordt gebruik gemaakt van de methode `findOrFail()`. Mocht het zo zijn dat de resource niet bestaat dan geeft Laravel de juiste foutmelding.

View
----

De view om de specifieke resource te tonen.

```php
@extends('./layout/layout')

@section('title', 'Assignments')

@section('content')

    <h1>Assignment {{ $assignment->id }}</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{$assignment->image_url}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$assignment->project_name}}</h5>
                            <p class="card-text">
                                {{$assignment->description}}
                            </p>
                    </div>
                </div>
            </div>    
    </div>
@endsection
```