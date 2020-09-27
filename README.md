# Dokumentation: Tierverwaltung für Tierheime

von **Johannes Munker**



## Grundlegendes

Dieses Projekt ist im Rahmen einer Studienarbeit im Fach "Client Server" der Hochschule Ansbach entstanden. Die Dokumentation soll einen Überblick über die Funktionen, den Aufbau und die Struktur geben. Desweiteren soll Sie einen einfachen Wiedereinstieg ermöglichen und die Installation auf [XAMPP](https://www.apachefriends.org/de/index.html) erläutern.



## Begriffe

1. **Admin**: Ein Benutzer, der händisch als Admin gekennzeichnet wurde.
2. **User**: Ein Benutzer, der mit seinem Account eingeloggt ist.
3. **Gast**: Ein Benutzer/ Besucher, der keinen Account hat/ nicht eingeloogt ist.



## Idee

Die Grundidee besteht darin, ein einfaches System für Tierheime zu schaffen, mit dem der aktuelle Tierbestand verwaltet werden kann. Gleichzeitig sollen sich User und Gäste die aktuellen Tiere ansehen und weitere Informationen holen können. 



## Alle Funktionen im Überblick

- Tiere hinzufügen, anschauen, bearbeiten und löschen
- Tierbild hochladen
- Rassen und Tierarten werden automatisch angelegt und verknüpft beim Erstellen von Tieren
- Nach Tieren suchen und filtern
- Eine Übersichtsseite mit allen Tierarten
- Abteilungen hinzufügen, anschauen, bearbeiten und löschen
- Authentifizierungs- /Login-System



## Technik

**Framework:** [Laravel 7](https://laravel.com/)

**Styling:** [Bootstrap](https://getbootstrap.com/)

**Datenbank:** [MySQL](https://www.mysql.com/de/)

**Installierte Composer-Plugins:** 

- [nesbot/carbon](https://carbon.nesbot.com/docs/) - für einfacheres Datumsmanagement

- [laravelcollectiv/html](https://laravelcollective.com/docs/6.0/html) - für einfachere Formulare
- [laravel/ui](https://github.com/laravel/ui) - für Authentifizierung



## Installation auf XAMPP

1. Die Zip-Datei entpacken und den Projekt-Ordner im htdocs-Ordner von XAMPP ablegen

2. In XAMPP den Webserver und die Datenbank starten und in phpMyAdmin eine neue Datenbank namens "animal_administration" anlegen

3. Den Ordner in einem beliebigen Code editor öffnen

4. Im Projektverzeichnis ein Terminal starten und den Befehl `php artisan serve` ausführen

5. Im Terminal müsste nun die Adresse zu sehen sein unter der die Anwendung läuft. Diese Adresse kopieren und im Browser mit dem Zusatz **/init** aufrufen. (in meinem Fall: http://127.0.0.1:8000/init)

   **ACHTUNG!** Schritt 5 ist essenziell, damit die Datenbanktabllen angelegt und mit Beispieldaten befüllt werden. Außerdem wird der Symlink zum Storage Ordner der App neu angelegt

6. Jetzt sollte die Anwendung mit Beispieldaten unter der im Terminal angegebenen Adresse erreichbar sein



## Aufbau und Funktion der Anwendung

Auf der Seite **Tierübersicht** befinden sich alle gespeicherten Tiere, die über einen Klick auf das jeweilige Tier angeschaut werden können. Zudem kann über das Suchfeld nach bestimmten Tieren gesucht und die Suche über die zwei Parameter "Geschlecht" und "Kastriert" verfeinert werden. 

Auf der Seite **Tierarten** befindet sich eine Übersicht aller Tierarten, denen Tiere zugewiesen sind. Wenn auf eine Tierart geklickt wird, kommt man auf eine Unterseite mit allen Tieren dieser Tierart. Von dort aus kann man wie auf der Seite "Tierübersicht" die Tiere auswählen und Sie genauer anschauen.

Auf der Seite **Abteilungen** befindet sich eine Übersicht aller Abteilungen, deren Ansprechpartner und Kontaktdaten.

In der Navigation befinden sich außerdem die zwei Punkte **Login** und **Registrierung**. Hier kann sich ein Gast registrieren oder der User anmelden. 

### CRUD

####  Tiere

Das **Hinzufügen von Tieren** ist als Admin entweder über Buttons auf den Seiten "Tierübersicht" und "Tierarten" oder über den Punkt "Tier hinzufügen" im User-Dropdown möglich. Der Admin kommt dann zu einer neuen Seite mit Formular und kann hier alle Daten eintragen, sowie ein Bild hochladen (Falls kein Bild hochgeladen wird, wird ein Platzhalterbild verwendet). 

Die **Detailansicht von Tieren** erreichen alle Nutzer mit einem Klick auf ein Tier. Hier werden alle vorhandenen Informationen angezeigt.

Das **Bearbeiten von Tieren** ist als Admin über den Button "Bearbeiten" in der Detailansicht möglich. Der Admin kommt zu einer Seite mit Formular, in dem alle vorhandenen Daten eingetragen sind. Er kann diese dann nach Belieben ändern und ein neues Bild hochladen (Das alte Bild wird gelöscht, falls ein Neues hochgeladen wird). 

Das **Löschen von Tieren** ist als Admin über den Button "Löschen" in der Detailansicht möglich.

####  Abteilungen

Das **Hinzufügen von Abteilungen** ist als Admin über den Button "Abteilung hinzufügen" auf der Seite "Abteilungen" möglich. Der Admin kommt dann zu einer neuen Seite mit Formular und kann hier alle Daten eintragen.

Eine **Detailansicht der Abteilungen** ist nicht vorhanden, da sie nicht benötigt wird. Alle relevanten Daten werden auf der Übersichtsseite angezeigt.

Das **Bearbeiten von Abteilungen** ist als Admin über den Button "Bearbeiten" auf der Seite "Abteilungen verwalten" bei der jeweiligen Abteilung möglich. Der Admin kommt zu einer neuen Seite mit Formular, in dem alle vorhandenen Daten eingetragen sind. Er kann diese dann nach Belieben ändern. Es können keine zwei Abteilungen mit gleichem Namen angelegt werden.

Das **Löschen von Abteiungen** ist als Admin über den Button "Löschen" auf der Seite "Abteilungen" bei der jeweiligen Abteilung möglich. 



## Datenbank

Als **Datenbank** verwendet die Anwendung **MySQL**. Das Erstellen der Tabelle sowie die Zugriffe und Schreibvorgänge werden über **Eloquent** durchgeführt. 

Alle Tabellen werden über den Befehl `php artisan migrate` mit Hilfe die erstellten Migrationsdateien von Laravel automatisch erstellt. 

### Aufbau der Datenbank

Die Datenbank **animal_administration** besteht aus folgenden 5 Tabellen: **Tiere** (animals), **Rassen** (breeds), **Tierarten** (species), **Abteilungen** (departments) und **Nutzer** (users)



## Authentifizierung

Die Authentifizierung läuft über zwei **Middlewares**. Diese verhindern, dass ein Gast oder User auf die CRUD-Funktionalitäten zugreifen kann (außer "READ"). 

Die Middleware "**Auth**" überprüft, ob es sich um einen eingeloggten Benutzer oder einen Gast handelt. Die Middleware "**Admin**" überprüft, ob es sich um einen Admin handelt.



## Testaccount

Einen Admin-Testaccount und einen normalen User habe ich schon angelegt. 

### Admin

**E-Mail**: admin@tierverwaltung.de; **Passwort**: admin1234

### User

**E-Mail**: user@tierverwaltung.de; **Passwort:** user1234



## Ordnerstruktur

### /app/Http/Controllers

#### /AnimalsController.php

**CRUD-Funktionen für Tiere** 

`index()` zeigt alle Tiere an;  `create()` verweist auf ein Formular zum Erstellen eines neuen Tiers; `store()` validiert und speichert gegebenenfalls das neue Tier mit den Daten aus dem Formular; `show()` verweist auf ein einzelnes Tier; `edit()` verweist auf ein Formular zum Bearbeiten eines Tiers; `update()` validiert und speichert gegebenenfalls die geänderten Daten ab; `destroy()` entfernt ein Tier aus der Datenbank

**Suchfunktion/ Tierarten**

`search()` gibt alle Tiere zurück, die den Suchkriterien entsprechen; `categories()` verweist auf eine Seite mit allen Tierarten denen Tiere zugewiesen sind; `showCategory()` zeigt alle Tiere die einer bestimmten Tierart zugewiesen sind

#### /DepartmentsController.php

**CRUD-Funktionen für Abteilungen** 

`index()`  zeigt alle Abteilungen an; `create()` verweist auf ein Formular zum Erstellen einer neuen Abteilung;  `store()` validiert und speichert gegebenenfalls die neue Abteilung mit den Daten aus dem Formular ab; `show()` ist nicht definiert, da diese Funktion nicht benötigt wird; `edit()` verweist auf ein Formular zum Bearbeiten einer Abteilung; `update()` validiert und speichert gegebenenfalls die geänderten Daten ab; `destroy()` entfernt eine Abteilung aus der Datenbank, sofern kein Tier damit verbunden ist

#### /auth

Enthält alle Funktionen zur Authentifizierung von Usern (wird von Laravel über den Befehl `php artisan ui vue --auth` automatisch erstellt)

### Models

Die einzelnen Models Animal (`Animal.php`), Breed (`Breed.php`), Species (`Species.php`), Department (`Department.php`) und User (`User.php`) legen jeweils die Beziehungen zueinander mit Hilfe von Eloquent fest. Zusätzlich liegen in der Klasse Animal noch Funktionen für die Suche/ Filterung. Das Model User wird durch Laravel automatisch generiert.

### /database/migrations

* hier sind die Migrations, also die Vorlagen, für die Datenbanktabellen gespeichert
* durch den Befehl `php artisan migrate` können auf einem neuen System die Tabellen automatisch generiert werden
* davor muss natürlich die Verbindung zur Datenbank stehen

### /public

hier werden alle kompilierten Daten für den Client gespeichert

### /resources/views

hier sind alle Blade-Templates gespeichert 

#### /auth

hier liegen alle Templates für die Authentifizierung

#### /inc

hier liegt das Template für die Navigation `nav.blade.php`, sowie ein Template für Erfolgs- oder Fehlermeldungen `messages.blade.php`

#### /layouts

hier liegt das Grundgerüst  `app.blade.php` der Anwendung, dass von allen anderen Templates als Basis verwendet wird

#### /pages/animal

hier liegen alle Seiten für die CRUD-Funktionen der Tiere und die Übersichtsseite für alle Tiere

#### /pages/department

hier liegen alle Seiten für die CRUD-Funktionen der Abteilungen (außer für einzelne Abteilungen)  und die Übersichtsseite für alle Abteilungen

### /routes/web.php

hier werden alle Routen für die App mit der jeweiligen Funktion definiert

### /storage/app/public/animal_pictures

hier werden alle hochgeladenen Bilder gespeichert und über einen Symlink in den Ordner `/public/storage/animal_pictures` gespiegelt



## Quellen

* Beispielbilder: [Pexels](https://www.pexels.com/de-de/)

