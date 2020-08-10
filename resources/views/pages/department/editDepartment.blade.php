@extends('layouts.app')

@section('content')

    <div class="d-flex w-100">
        <a href="/departments" class="btn btn-secondary mb-4 text-white">Zurück</a>
        @if (!Auth::guest() && Auth::user()->admin == 1)
            {!! Form::open(['action' => ['AnimalsController@destroy', $department->id], '_method' => 'POST', 'class' => 'ml-auto'])!!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Löschen', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        @endif
    </div>

<h1 class="font-weight-bold mt-3 mb-4">Abteilung {{$department->department}} bearbeiten</h1>
<div>
    {!! Form::open(['action' => ['DepartmentController@update', $department->id], 'method' => 'POST']) !!}
    <div class="form-group">
        <div class="row pb-4">
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('abteilungsname', 'Abteilungsname')}}
                {{Form::text('abteilungsname', $department->department, ['id' => 'abteilung', 'class' => 'form-control', 'placeholder' => 'Abteilung eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('kontaktvorname', 'Kontaktvorname')}}
                {{Form::text('kontaktvorname', $department->contact_name, ['id' => 'kontaktvorname', 'class' => 'form-control', 'placeholder' => 'Vornamen der Kontaktperson eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('kontaktnachname', 'Kontaktnachname')}}
                {{Form::text('kontaktnachname', $department->contact_surname, ['id' => 'kontaktnachname', 'class' => 'form-control', 'placeholder' => 'Nachnamen der Kontaktperson eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('kontakttelefon', 'Kontakttelefon')}}
                {{Form::text('kontakttelefon', $department->contact_telefon, ['id' => 'kontaktnachname', 'class' => 'form-control', 'placeholder' => 'Telefonnummer Kontaktperson'])}}
            </div>
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Abteilung aktualisieren', ['class' => 'btn btn-success'])}}
    </div>
    {!! Form::close() !!}
</div>


@endsection