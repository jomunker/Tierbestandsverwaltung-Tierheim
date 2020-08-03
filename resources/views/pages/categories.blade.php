@extends('layouts.app')

@section('content')


    <h1 class="font-weight-bold mt-3 mb-4">Kategorien</h1>
    <div class="container-xl">
        <div class="row">
            @foreach ($species as $specie)
                <div class="col-sm-6 col-lg-4">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        {{-- @if ($animal->animal_picture != null)
                            <div class="col-auto d-none d-block" style="height: 15rem">
                                <img class="img-fluid" style="height: 100%; width: 100%; object-fit: cover;"
                                    src="/storage/animal_pictures/{{ $animal->animal_picture }}">
                            </div>
                        @endif --}}
                        <div class="col p-4 d-flex flex-column position-static">
                            <h2 class="mb-0">{{ $specie->species }}</h2>
                            {{-- <p class="card-text mb-auto">This is a wider card with
                                supporting text below as a natural lead-in to additional content.</p>
                            --}}
                            <a href="/categories/{{ $specie->id }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
