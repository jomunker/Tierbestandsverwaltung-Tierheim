@extends('layouts.app')

@section('content')

    <div class="d-flex w-100">
        <a href="/departments" class="btn btn-secondary mb-4 text-white">Zurück</a>
    </div>

<h1 class="font-weight-bold mt-3 mb-4">Abteilung anlegen</h1>
<div>
    {!! Form::open(['action' => 'DepartmentController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        <div class="row pb-4">
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('abteilungsname', 'Abteilungsname')}}
                {{Form::text('abteilungsname', '', ['id' => 'abteilung', 'class' => 'form-control', 'placeholder' => 'Abteilung eingeben'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('kontaktvorname', 'Kontaktvorname')}}
                {{Form::text('kontaktvorname', '', ['id' => 'kontaktvorname', 'class' => 'form-control', 'placeholder' => 'Vornamen Kontaktperson'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('kontaktnachname', 'Kontaktnachname')}}
                {{Form::text('kontaktnachname', '', ['id' => 'kontaktnachname', 'class' => 'form-control', 'placeholder' => 'Nachnamen Kontaktperson'])}}
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                {{Form::label('kontakttelefon', 'Kontakttelefon')}}
                {{Form::text('kontakttelefon', '', ['id' => 'kontaktnachname', 'class' => 'form-control', 'placeholder' => 'Nachnamen der Kontaktperson eingeben'])}}
            </div>
        </div>
        {{Form::submit('Abteilung anlegen', ['class' => 'btn btn-success'])}}
    </div>
    {!! Form::close() !!}
</div>


@endsection