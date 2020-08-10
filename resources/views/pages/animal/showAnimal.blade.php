@extends('layouts.app')

@section('content')

    <div class="d-flex w-100">
        @if ((strpos(strval(url()->previous()), 'categories') !== false) && (strpos(strval(url()->previous()), 'animals')
        !== false))
        <a href="/categories" class="btn btn-secondary mb-4 text-white">Zurück</a>
    @else
        @if (strpos(strval(url()->previous()), 'categories') !== false)
        <a href="/categories" class="btn btn-secondary mb-4 text-white">Zurück</a>
        @endif
        @if (strpos(strval(url()->previous()), 'animals') !== false)
        <a href="/animals" class="btn btn-secondary mb-4 text-white">Zurück</a>
        @endif
        @endif

        @if (!Auth::guest() && Auth::user()->admin == 1)
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
            <div class="col-12 col-md-6 d-block w-100" style="height: 100%;">
                <img class="rounded w-100" style="object-fit: cover; height: 100%;"
                    src="/storage/animal_pictures/{{ $animal->animal_picture }}">
            </div>
        @else
            <div class="col-12 col-md-6 d-none d-block w-100" style="height: 100%;">
                <img class="rounded w-100" style="object-fit: cover; height: 100%;"
                    src="/storage/animal_pictures/noimage.png">
            </div>
        @endif
        <div class="col-12 col-md-6 d-flex mt-4 mt-md-0 w-100" style="height: 100%;">
            <ul class="list-unstyled d-flex flex-column pt-4 pl-4 pr-4 pb-2 w-100 card" style="margin: 0; height: 100%">
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
                        class="text-muted"><?php echo $age ?></span></li>
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
        <div class="col-8 mt-4 mb-2 d-flex">
            <p class="mt-3 w-100 m-auto" style="">{{ $animal->description }}</p>
        </div>
        <div class="col-12 ml-auto mr-auto mb-4">

            @if ($animal->mediated == 0)
                <hr>
                <h2 class="mt-4">Du möchtest mich besser kennenlernen?</h2>
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
            @else
                <hr>
                <h2 class="mt-4">Ich bin leider schon vergeben, aber du kannst mich trotzdem gerne besuchen.</h2>
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
            @endif
        </div>
    </div>






@endsection
