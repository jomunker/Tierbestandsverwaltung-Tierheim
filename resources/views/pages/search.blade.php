@extends('layouts.app')

@section('content')

    <h1 class="font-weight-bold mt-3 mb-4">Suche</h1>

    <div>
        {{-- <h4 class="text-muted">Filtern</h4> --}}
        {!! Form::open(['action' => 'AnimalsController@search', 'method' => 'GET']) !!}
        <div class="form-group">
            <div class="row pb-4">
                <div class="col-sm-12 col-md-5 pt-2 pb-2">
                    {{ Form::label('suche', 'Suche') }}
                    {{ Form::text('suche', request('suche'), ['class' => 'form-control', 'placeholder' => 'Suchbegriff eingeben...']) }}
                </div>
                {{-- <div class="col-sm-6 col-md-3 pt-2 pb-2">
                    {{ Form::label('tierart', 'Tierart') }}
                    {{ Form::select('tierart', $species->pluck('species'), '', ['class' => 'form-control']) }}
                </div> --}}
                <div class="col-sm-6 col-md-3 pt-2 pb-2">
                    {{ Form::label('geschlecht', 'Geschlecht') }}
                    {{ Form::select('geschlecht', ['' => 'egal', 'm' => 'männlich', 'w' => 'weiblich'], request('geschlecht'), ['class' => 'form-control']) }}
                </div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2">
                    {{ Form::label('kastriert', 'Kastriert') }}
                    {{ Form::select('kastriert', ['' => 'egal', '1' => 'ja', '0' => 'nein'], request('castrated'), ['class' => 'form-control']) }}
                </div>
                <div class="col-sm-6 col-md-1 pt-2 pb-2 d-flex">
                    {{ Form::submit('Suchen', ['class' => 'btn btn-success align-self-end']) }}
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

    @if (count($animals) >= 1)
        <div class="row mb-3">

            @foreach ($animals as $animal)
                <div class="col-sm-6 col-lg-4">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        @if ($animal->animal_picture != null)
                            <div class="col-auto d-none d-block" style="height: 15rem">
                                <img class="img-fluid" style="height: 100%; width: 100%; object-fit: cover;"
                                    src="/storage/animal_pictures/{{ $animal->animal_picture }}">
                            </div>
                        @endif
                        <div class="col p-4 d-flex flex-column position-static">
                            <h2 class="mb-0">{{ $animal->name }}</h2>
                            <ul class="pt-2 list-unstyled">
                                <li class="flex-fill w-100"><strong>Geschlecht: </strong>
                                    @if ($animal->gender == 'w')
                                        <span class="text-muted">weiblich</span>
                                        @else
                                        <span class="text-muted">männlich</span>
                                    @endif
                                </li>
                                <li class="flex-fill w-100"><strong>Rasse: </strong><span
                                        class="text-muted">{{ $animal->breed->breed }}</span></li>
                                <li class="flex-fill w-100"><strong>Tierart: </strong><span
                                        class="text-muted">{{ $animal->breed->species->species }}</span></li>
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
                            <a href="/animals/{{ $animal->id }}" class="stretched-link">Mehr anzeigen</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $animals->links() }}
        @else
        <h3 class="text-info">Keine Tiere gefunden.</h3>
    @endif

@endsection
