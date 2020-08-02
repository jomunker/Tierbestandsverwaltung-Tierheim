@extends('layouts.app')

@section('content')


<h1 class="font-weight-bold mt-3 mb-4">{{$animal->name}} bearbeiten</h1>
<div>
    {!! Form::open(['action' => ['AnimalsController@update', $animal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <div class="row pb-4">
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $animal->name, ['class' => 'form-control', 'placeholder' => 'Namen eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('geschlecht', 'Geschlecht')}}
                {{Form::select('geschlecht', ['w' => 'weiblich', 'm' => 'männlich'], $animal->gender, ['class' => 'form-control'])}}  
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('rasse', 'Rasse')}}
                {{Form::text('rasse', $animal->breed->breed, ['class' => 'form-control', 'placeholder' => 'Rasse eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('tierart', 'Tierart')}}
                {{Form::text('tierart', $animal->breed->species->species, ['class' => 'form-control', 'placeholder' => 'Tierart eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('abteilung', 'Abteilung')}}
                {{Form::select('abteilung', $departments->pluck('department'), $animal->breed->species->department_id, ['class' => 'form-control'])}}             
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('farbe', 'Farbe(n)')}}
                {{Form::text('farbe', $animal->colors, ['class' => 'form-control', 'placeholder' => 'Farbe(n) eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('groesse', 'Größe')}}
                {{Form::select('groesse', ['sehr klein' => 'sehr klein', 'klein' => 'klein',  'mittel' => 'mittel',  'groß' => 'groß',  'sehr groß' => 'sehr groß'], $animal->size, ['class' => 'form-control'])}}               
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('geburt', 'Geburtsdatum')}}
                {{Form::date('geburt', $animal->birth_date, ['class' => 'form-control'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('aufnahme', 'Aufnahmedatum')}}
                {{Form::date('aufnahme', $animal->admission_date, ['class' => 'form-control'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('kastriert', 'Kastriert')}}
                {{Form::select('kastriert', ['0' => 'nein', '1' => 'ja'], $animal->castrated, ['class' => 'form-control'])}}     
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('vermittelt', 'Vermittelt')}}
                {{Form::select('vermittelt', ['0' => 'nein', '1' => 'ja'], $animal->mediated, ['class' => 'form-control'])}}     
            </div>
            <div class="col-sm-12 col-md-6 pt-2 pb-2"> 
                {{Form::label('beschreibung', 'Beschreibung')}}
                {{Form::textarea('beschreibung', $animal->description, ['class' => 'form-control', 'placeholder' => 'Beschreibung eingeben'])}}
            </div>
            {{Form::hidden('max_file_size', '2000000')}}
            <div class="col-sm-12 col-md-12 pt-4 pb-2"> 
                {{Form::File('tierbild', [ 'accept' => 'image/jpg,image/png,image/jpeg,image/gif'])}}
            </div>
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Tier aktualisieren', ['class' => 'btn btn-success'])}}
    </div>
    {!! Form::close() !!}
</div>


@endsection