@extends('layouts.app')

@section('content')

    <div class="d-flex w-100">
        <a href="/animals" class="btn btn-secondary mb-4 text-white">Zurück</a>
        @if (!Auth::guest())
            <a href="/departments/create" class="btn btn-success mb-4 ml-auto" style="width: fit-content">Abteilung
                hinzufügen</a>
        @endif
    </div>


    <h1 class="font-weight-bold mt-3 mb-4">Abteilungen</h1>

    @if (count($departments) >= 1)
        <div class="row mb-3">
            @foreach ($departments as $department)
                <div class="col-sm-6 col-lg-4">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h2 class="mb-0">{{ $department->department }}</h2>
                            <ul class="pt-2 list-unstyled">
                                <li class="flex-fill w-100"><strong>Ansprechpartner: </strong><span
                                        class="text-muted">{{ $department->contact_name }}
                                        {{ $department->contact_surname }}</span></li>
                                <li class="flex-fill w-100"><strong>Telefonnummer: </strong><span
                                        class="text-muted">{{ $department->contact_telefon }}</span></li>
                            </ul>
                            <div class="row">
                                <div class="col-sm-6 w-100 pr-2">
                                    <a href="/departments/{{ $department->id }}/edit"
                                        class="btn btn-primary text-white w-100">Bearbeiten</a>
                                </div>
                                <div class="col-sm-6 w-100 pl-2">

                                    {!! Form::open(['action' => ['DepartmentController@destroy', $department->id], '_method'
                                    => 'POST', 'class' => '']) !!}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Löschen', ['class' => 'btn btn-danger w-100']) }}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    @else
        <h3 class="text-info">Keine Abteilungen gefunden.</h3>
    @endif

@endsection
