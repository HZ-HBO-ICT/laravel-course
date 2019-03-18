Dynamische websites halen vaak hun gegevens uit een database. In veel gevallen wordt er gebruik gemaakt van een SQL om een database te creeren, vullen en te manipuleren.

Laravel is een framework om dynamische websites te maken en maakt gebruik van een MVC design paters, die het werken met een database in het begin wat lastiger maakt.

In MVC zijn verantwoordelijkheden verdeeld in verschillende lagen. In dit document worden een aantal topics aangestipt en verduidelijkt om vervolgens in te gaan in het opzetten van diverse CRUD operaties om via een webpagina gegevens in een tabel te zetten en te tonen op een pagina.

Voorbeeld
---------

---

Om de theorie toe te passen maken we gebruik van een casus. In deze casus willen we een portfolio website maken. In deze portfolio website moeten de gemaakte opdrachten (assignments) in een database worden opgeslagen en worden getoond op een webpagina. In de tabel assignments worden de volgende gegevens opgeslagen:

* id (automatische verhogen)
* Project naam
* Link naar een plaatje
* Beschrijvinge van de opdracht

