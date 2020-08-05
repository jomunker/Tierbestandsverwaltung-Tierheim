@extends('layouts.app')

@section('content')


<h1 class="font-weight-bold">Tier hinzufügen</h1>

<div>
    {!! Form::open(['action' => 'AnimalsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

        <div class="row pb-4">
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Namen eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('geschlecht', 'Geschlecht')}}
                {{Form::select('geschlecht', ['w' => 'weiblich', 'm' => 'männlich'], 'm', ['id' => 'gender', 'class' => 'form-control'])}}  
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('rasse', 'Rasse')}}
                {{Form::text('rasse', '', ['id' => 'breed', 'class' => 'form-control', 'placeholder' => 'Rasse eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('tierart', 'Tierart')}}
                {{Form::text('tierart', '', ['id' => 'species', 'class' => 'form-control', 'placeholder' => 'Tierart eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('abteilung', 'Abteilung')}}
                {{Form::select('abteilung', $departments->pluck('department'), '', ['id' => 'department', 'class' => 'form-control'])}}             
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('farbe', 'Farbe(n)')}}
                {{Form::text('farbe', '', ['id' => 'color', 'class' => 'form-control', 'placeholder' => 'Farbe(n) eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('groesse', 'Größe')}}
                {{Form::select('groesse', ['sehr klein' => 'sehr klein', 'klein' => 'klein',  'mittel' => 'mittel',  'groß' => 'groß',  'sehr groß' => 'sehr groß'], 'mittel', ['id' => 'size', 'class' => 'form-control'])}}               
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('geburt', 'Geburtsdatum')}}
                {{Form::date('geburt', \Carbon\Carbon::now(), ['id' => 'birth_date', 'class' => 'form-control'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('aufnahme', 'Aufnahmedatum')}}
                {{Form::date('aufnahme', \Carbon\Carbon::now(), ['id' => 'admission_date', 'class' => 'form-control'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('kastriert', 'Kastriert')}}
                {{Form::select('kastriert', ['0' => 'nein', '1' => 'ja'], '0', ['id' => 'castrated', 'class' => 'form-control'])}}     
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('vermittelt', 'Vermittelt')}}
                {{Form::select('vermittelt', ['0' => 'nein', '1' => 'ja'], '0', ['id' => 'mediated', 'class' => 'form-control'])}}     
            </div>
            <div class="col-sm-12 col-md-6 pt-2 pb-2"> 
                {{Form::label('beschreibung', 'Beschreibung')}}
                {{Form::textarea('beschreibung', '', ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Beschreibung eingeben'])}}
            </div>
            <div class="col-sm-12 col-md-12 pt-4 pb-2"> 
                {{Form::file('tierbild', [ 'accept' => 'image/jpg,image/png,image/jpeg,image/gif'])}}
                <small class="text-muted mt-2 d-block">Maximale Dateigröße 2MB</small>
            </div>
        </div>
        {{Form::submit('Tier hinzufügen', ['class' => 'btn btn-success'])}}
    </div>
    {!! Form::close() !!}

</div>


@endsection