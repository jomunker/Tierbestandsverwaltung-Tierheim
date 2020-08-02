@extends('layouts.app')

@section('content')


<h1 class="font-weight-bold">Tier hinzufügen</h1>

<div>
    {!! Form::open(['action' => 'AnimalsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

        <div class="row pb-4">
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Namen eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('geschlecht', 'Geschlecht')}}
                {{Form::select('geschlecht', ['w' => 'weiblich', 'm' => 'männlich'], 'm', ['class' => 'form-control'])}}  
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('rasse', 'Rasse')}}
                {{Form::text('rasse', '', ['class' => 'form-control', 'placeholder' => 'Rasse eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('tierart', 'Tierart')}}
                {{Form::text('tierart', '', ['class' => 'form-control', 'placeholder' => 'Tierart eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('abteilung', 'Abteilung')}}
                {{Form::select('abteilung', $departments->pluck('department'), '', ['class' => 'form-control'])}}             
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('farbe', 'Farbe(n)')}}
                {{Form::text('farbe', '', ['class' => 'form-control', 'placeholder' => 'Farbe(n) eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('groesse', 'Größe')}}
                {{Form::select('groesse', ['sehr klein' => 'sehr klein', 'klein' => 'klein',  'mittel' => 'mittel',  'groß' => 'groß',  'sehr groß' => 'sehr groß'], 'mittel', ['class' => 'form-control'])}}               
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('geburt', 'Geburtsdatum')}}
                {{Form::date('geburt', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('aufnahme', 'Aufnahmedatum')}}
                {{Form::date('aufnahme', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('kastriert', 'Kastriert')}}
                {{Form::select('kastriert', ['0' => 'nein', '1' => 'ja'], '0', ['class' => 'form-control'])}}     
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('vermittelt', 'Vermittelt')}}
                {{Form::select('vermittelt', ['0' => 'nein', '1' => 'ja'], '0', ['class' => 'form-control'])}}     
            </div>
            <div class="col-sm-12 col-md-6 pt-2 pb-2"> 
                {{Form::label('beschreibung', 'Beschreibung')}}
                {{Form::textarea('beschreibung', '', ['class' => 'form-control', 'placeholder' => 'Beschreibung eingeben'])}}
            </div>
            <div class="col-sm-12 col-md-12 pt-4 pb-2"> 
                {{Form::File('tierbild', [ 'accept' => 'image/jpg,image/png,image/jpeg,image/gif'])}}
                <small class="text-muted mt-2 d-block">Maximale Dateigröße 2MB</small>
            </div>
        </div>
        {{Form::submit('Tier hinzufügen', ['class' => 'btn btn-success'])}}
    </div>
    {!! Form::close() !!}

    {{-- <form>

        <div class="row pb-4">
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Namen eingeben..." required>
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="geschlecht">Geschlecht</label>
                <select class="form-control">
                    <option>weiblich</option>
                    <option>männlich</option>
                </select>        
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="rasse">Rasse</label>
                <input type="text" class="form-control" id="rasse" placeholder="Rasse eingeben..." required>
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="tierart">Tierart</label>
                <input type="text" class="form-control" id="tierart" placeholder="Tierart eingeben..." required>
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="abteilung">Abteilung</label>
                <select class="form-control">
                    <option>Hunde</option>
                    <option>Katzen</option>
                    <option>Kleintiere</option>
                    <option>Vögel</option>
                </select>               
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="farbe">Farbe(n)</label>
                <input type="text" class="form-control" id="farbe" placeholder="Farbe(n) eingeben..." required>
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="size">Größe</label>
                <select class="form-control" >
                    <option>sehr klein</option>
                    <option>klein</option>
                    <option selected>mittel</option>
                    <option>groß</option>
                    <option>sehr groß</option>
                </select>                
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="geburt">Geburtsdatum</label>
                <input type="date" class="form-control" id="geburt" required>
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="aufnahme">Aufnahmedatum</label>
                <input type="date" class="form-control" id="aufnahme" required>
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
        <button class="btn btn-primary" type="submit">Tier hinzufügen</button>
    </form> --}}
</div>


@endsection