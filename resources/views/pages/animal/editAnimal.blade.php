@extends('layouts.app')

@section('content')


<h1>Tier bearbeiten</h1>

<div>
    <form>
        <div class="row pb-4">
            <div class="col-sm-12 col-md-6 pt-2 pb-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name eingeben..." required>
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="aufnahme">Aufnahmedatum</label>
                <input type="date" class="form-control" id="aufnahme" required>
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="geburt">Geburtsdatum</label>
                <input type="date" class="form-control" id="geburt" required>
            </div>
            <div class="col-sm-12 col-md-6 pt-2 pb-2">
                <label for="farbe">Farbe(n)</label>
                <input type="text" class="form-control" id="farbe" placeholder="Farbe(n) eingeben..." required>
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="rasse">Rasse</label>
                <select class="form-control">
                    <option>Golden Retriever</option>
                    <option>Mops</option>
                    <option>Labrador</option>
                    <option>Husky</option>
                </select>        
            </div>
            {{-- <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="tierart">Tierart</label>
                <select class="form-control" id="tierart">
                    <option>Hund</option>
                    <option>Katze</option>
                    <option>Vogel</option>
                    <option>Reptil</option>
                </select>        
            </div> --}}
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="geschlecht">Geschlecht</label>
                <select class="form-control">
                    <option>weiblich</option>
                    <option>männlich</option>
                </select>        
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="kastriert">Kastriert</label>
                <select class="form-control">
                    <option>Ja</option>
                    <option>Nein</option>
                </select>        
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="vermittelt">Vermittelt</label>
                <select class="form-control">
                    <option>Ja</option>
                    <option>Nein</option>
                </select>        
            </div>
            <div class="col-sm-12 col-md-6 pt-2 pb-2">
                <label for="beschreibung">Beschreibung</label>
                <textarea type="text" class="form-control" id="beschreibung" placeholder="Beschreibung eingeben..." required></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Aktualisieren</button>
    </form>
</div>


@endsection