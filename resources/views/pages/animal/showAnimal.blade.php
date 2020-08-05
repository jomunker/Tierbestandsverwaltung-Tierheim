@extends('layouts.app')

@section('content')

    <div class="d-flex w-100">
        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-4 text-white">Zurück</a>
        @if (!Auth::guest())
            <a href="/animals/{{ $animal->id }}/edit" class="btn btn-dark mb-4 ml-auto"
                style="width: fit-content">Bearbeiten</a>
            {!! Form::open(['action' => ['AnimalsController@destroy', $animal->id], '_method' => 'POST', 'class' => 'ml-2'])
            !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Löschen', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        @endif
    </div>




    <h1 class="text-center mt-3 mb-4" style="font-size: 3rem">Hi, ich bin {{ $animal->name }}!</h1>

    <div class="row mb-3" style="height: 20rem;">
        @if ($animal->animal_picture != null)
            <div class="col-6 d-none d-block w-100" style="height: 100%;">
                <img class="rounded w-100" style="object-fit: cover; height: 100%;"
                    src="/storage/animal_pictures/{{ $animal->animal_picture }}">
            </div>
        @else
            <div class="col-6 d-none d-block w-100" style="height: 100%;">
                <img class="rounded w-100" style="object-fit: cover; height: 100%;"
                    src="/storage/animal_pictures/noimage.png">
            </div>
        @endif
        <div class=" col-6 pr-3 pl-3 d-flex flex-column position-static card" style="height: 100%;">
            <ul class="list-unstyled d-flex flex-column mt-3" style="margin: 0; height: 100%">
                <li class="flex-fill w-100"><strong>Geschlecht: </strong>
                    @if ($animal->gender == 'w')
                        <span class="text-muted">weiblich</span>
                    @else
                        <span class="text-muted">männlich</span>
                    @endif
                </li>
                <li class="flex-fill w-100">
                    <div><strong>Rasse: </strong><span class="text-muted">{{ $animal->breed->breed }}</span></div>
                </li>
                {{-- <li class="flex-fill w-100"><strong>Geburtsdatum: </strong><span
                        class="text-muted"><?php echo $age; ?></span></li>
                --}}
                <li class="flex-fill w-100"><strong>Alter: </strong><span class="text-muted">{{ $animal->getAge() }}</span>
                </li>
                <li class="flex-fill w-100"><strong>Größe: </strong><span class="text-muted">{{ $animal->size }}</span></li>
                <li class="flex-fill w-100"><strong>Farbe(n): </strong><span class="text-muted">{{ $animal->colors }}</span>
                </li>
                <?php $date = date('d.m.Y', strtotime($animal->admission_date)); ?>
                <li class="flex-fill w-100"><strong>Im Tierheim seit: </strong><span class="text-muted"><?php
                        echo $date; ?></span></li>
                <li class="flex-fill w-100"><strong>Kastriert: </strong>
                    @if ($animal->castrated == 1)
                        <span class="text-muted">Ja</span>
                    @else
                        <span class="text-muted">Nein</span>
                    @endif
                <li class="flex-fill w-100"><strong>Vermittelt: </strong>
                    @if ($animal->mediated == 1)
                        <span class="text-muted">Ja</span>
                    @else
                        <span class="text-muted">Nein</span>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div>
        <div class="ml-auto mr-auto mt-4 mb-4">
            <p class="mt-3 w-100 text-justify" style="column-count: 2; width: 50%;">{{ $animal->description }}</p>
        </div>
        <hr>
        <div class="ml-auto mr-auto mt-4 mb-4">
            <h3>Du möchtest mich besser kennenlernen?</h3>
            <ul class="list-unstyled d-flex flex-column">
                <li class="flex-fill w-100"><strong>Ansprechpartner: </strong><span
                        class="text-muted">{{ $animal->breed->species->department->contact_name }}
                        {{ $animal->breed->species->department->contact_surname }}</span></li>
                <li class="flex-fill w-100"><strong>Abteilung: </strong><span
                        class="text-muted">{{ $animal->breed->species->department->department }}</span></li>
                <li class="flex-fill w-100"><strong>Telefonnummer: </strong><span class="text-muted"><a
                            href="tel:{{ $animal->breed->species->department->contact_telefon }}">{{ $animal->breed->species->department->contact_telefon }}</a></span>
                </li>
            </ul>
        </div>
    </div>

@endsection
