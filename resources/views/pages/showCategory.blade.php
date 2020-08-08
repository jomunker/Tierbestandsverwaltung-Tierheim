@extends('layouts.app')

@section('content')

    {{-- <div class="d-flex w-100">
        <a href="/categories" class="btn btn-secondary mb-4 text-white">Zurück</a>
    </div> --}}

    <div class="d-flex w-100 align-items-center">
        {{-- <h1 class="font-weight-bold mt-3 mb-4">{{ $category->species }}</h1>
        --}}
        <a href="/categories" class="btn btn-secondary mb-4 text-white">Zurück</a>
        @if (!Auth::guest() && Auth::user()->admin == 1)
            <a href="/animals/create" class="btn btn-success mb-4 ml-auto" style="width: fit-content">Tier hinzufügen</a>
        @endif
    </div>

    <h1 class="font-weight-bold mt-3 mb-4">{{ $category->species }}</h1>

    @if (count($category->animals) >= 1)
        <div class="row">
            @foreach ($category->animals as $animal)
                <div class="col-sm-6 col-lg-4">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        @if ($animal->animal_picture != null)
                            <div class="col-auto d-none d-block" style="height: 15rem">
                                <img class="img-fluid" style="height: 100%; width: 100%; object-fit: cover;"
                                    src="/storage/animal_pictures/{{ $animal->animal_picture }}">
                            </div>
                        @else
                            <div class="col-auto d-none d-block" style="height: 15rem">
                                <img class="img-fluid" style="height: 100%; width: 100%; object-fit: cover;"
                                    src="/storage/animal_pictures/noimage.png">
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
                            <a href="/categories/animals/{{ $animal->id }}/edit" class="stretched-link">Mehr anzeigen</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        {{-- {{ animals->links() }} --}}
    @else
        <h3 class="text-info">Keine Tiere gefunden.</h3>
    @endif
@endsection
