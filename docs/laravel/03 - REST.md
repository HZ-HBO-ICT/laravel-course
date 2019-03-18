Rest is een acroniem voor representational state transfer en is in 2000 geopperd door Roy Fielding ([https://www.ics.uci.edu/~fielding/pubs/dissertation/rest\_arch\_style.htm](https://www.ics.uci.edu/~fielding/pubs/dissertation/rest_arch_style.htm)).

In de context van Laravel gaat het heel plat gezegd over een **resource** en een **actie** die op die resource kan worden uitgevoerd.

Resource
--------

---

Wanneer aan informatie een goede naam kan worden gegeven spreekt men vaak van een resource. Voorbeelden zijn: een plaatje, een student, een cursus. Vaak komt dit overeen met een tabel. De resource wordt uniek geidentificeert door een URI (unique resource identifier). Een voorbeeld staat in de code hieronder.

```c
http://localhost:999/restfulservices/v1/assignments/{id}
protocol://host:port/application-context/version/resource/parameter
```

In deze context is ‘resource’ en de ‘parameter’ het meest interesssant. Een concreet voorbeeld staat in de volgende code.

```c
http://127.0.0.1:8000/assignments
```

Hierbij is de /assignments een resource en wanneer je dit intypt in de browser wordt er een ‘GET’ method of actie meegegeven.

Actie
-----

---

Een route zorgt er voor dat er een ‘weg’ is naar een bepaalde resource. Deze route is een uri (unique resource identifier) die verwijst naar een resource aangevuld met een actie. Deze actie geeft aan wat er met de resource moet gebeuren.

In onderstaande tabel staan de HTTP methods ([https://www.tutorialspoint.com/http/http\_methods.htm](https://www.tutorialspoint.com/http/http_methods.htm)) gelinkt aan de resources en de routes. Dit is een best practice.

HTTP method | URI | Action | Route Name
--- | --- | --- | ---
GET | /assignments | index | AssignmentsController@index
GET | /assignments/create | create | AssignmentsController@create
POST | /assignments | store | AssignmentsController@store
GET | /assignments/{assignment} | show | AssignmentsController@show
GET | /assignments/{assignment}/edit | edit | AssignmentsController@edit
PUT/PATCH | /assignments/{assignment} | update | AssignmentsController@update
DELETE | /assignments/{assignment} | destroy | AssignmentsController@destroy