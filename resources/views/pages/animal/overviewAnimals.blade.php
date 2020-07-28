@extends('layouts.app')

@section('content')


<h1>Übersicht</h1>

<div>
    {{-- <h4 class="text-muted">Filtern</h4> --}}
    <form>
        <div class="row pb-4">
            <div class="col-sm-12 col-md-6 pt-2 pb-2">
                <label for="suche">Suchen</label>
                <input type="text" class="form-control" id="suche" placeholder="Suchbegriff eingeben...">
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="tierart">Tierart</label>
                <select class="form-control" name="tierart">
                    <option>Hund</option>
                    <option>Katze</option>
                    <option>Vogel</option>
                    <option>Reptil</option>
                </select>        
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="tierart">Rasse</label>
                <select class="form-control">
                    <option>Golden Retriever</option>
                    <option>Husky</option>
                    <option>Labrador</option>
                    <option>Mops</option>
                </select>        
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="tierart">Geschlecht</label>
                <select class="form-control">
                    <option>weiblich</option>
                    <option>männlich</option>
                </select>        
            </div>
            <div class="col-sm-6 col-md-3 pt-2 pb-2">
                <label for="tierart">Kastriert</label>
                <select class="form-control">
                    <option>Ja</option>
                    <option>Nein</option>
                </select>        
            </div>
        </div>
    </form>
</div>



    @if(count($animals) >= 1) 
        <div class="row mb-3">

            @foreach ($animals as $animal)
                <div class="col-sm-6 col-lg-4">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        {{-- <div class="col-auto d-none d-block">
                            <img class="img-fluid" src="https://images.pexels.com/photos/2253275/pexels-photo-2253275.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                        </div> --}}
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
                                <li class="flex-fill w-100"><strong>Rasse: </strong><span class="text-muted">{{$animal->breed->breed}}</span></li>
                                <li class="flex-fill w-100"><strong>Tierart: </strong><span class="text-muted">{{$animal->breed->species->species}}</span></li>
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
                            {{-- <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p> --}}
                        <a href="/animals/{{$animal->id}}" class="stretched-link">Mehr anzeigen</a>
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