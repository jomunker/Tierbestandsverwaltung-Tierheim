@extends('layouts.app')

@section('content')

<a href="/Tierbestandsverwaltung/public/animals" class="btn btn-secondary mb-4">Zurück</a>
<div class="row mb-3" style="height: 300px;">
        <div class="col-6 d-none d-block w-100" style="height: 100%;">
            <img class="rounded w-100" style="object-fit: cover; height: 100%;" src="https://images.pexels.com/photos/2007/animal-dog-pet-cute.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500">
        </div>
        <div class=" col-6 pr-3 pl-3 d-flex flex-column position-static card" style="height: 100%;">
          <ul class="list-unstyled d-flex flex-column mt-3" style="margin: 0; height: 100%">
                <li class="flex-fill w-100"><strong>Geschlecht: </strong>
                    @if ($animal->gender == 'w')
                        <span class="text-muted">weiblich</span>
                    @else
                        <span class="text-muted">männlich</span>
                    @endif
                </li>
                <li class="flex-fill w-100"><div><strong>Rasse: </strong><span class="text-muted">{{ $animal->breed->breed }}</span></div></li>
                <?php $age = date('d.m.Y', strtotime($animal->birth_date)) ?>
                {{-- <li class="flex-fill w-100"><strong>Geburtsdatum: </strong><span class="text-muted"><?php echo $age ?></span></li> --}}
            <li class="flex-fill w-100"><strong>Alter: </strong><span class="text-muted">{{ $animal->getAge() }}</span></li>
                <li class="flex-fill w-100"><strong>Größe: </strong><span class="text-muted">{{ $animal->size }}</span></li>
                <?php $date = date('d.m.Y', strtotime($animal->admission_date)) ?>
                <li class="flex-fill w-100"><strong>Im Tierheim seit: </strong><span class="text-muted"><?php echo $date ?></span></li>
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
<div class="ml-auto mr-auto mt-5 mb-5" >
    <h1 class="text-center">Hi, ich bin {{ $animal->name }}!</h1>
    <p class="mt-3 w-100 text-justify" style="column-count: 2; width: 50%;">{{ $animal->description }}</p>
</div>
<hr>
<div class="ml-auto mr-auto mt-5 mb-5">
    <h3>Du möchtest mich besser kennenlernen?</h3>
    <ul class="list-unstyled d-flex flex-column">
        <li class="flex-fill w-100"><strong>Ansprechpartner: </strong><span class="text-muted">{{$animal->breed->species->department->contact_name}} {{$animal->breed->species->department->contact_surname}}</span></li>
        <li class="flex-fill w-100"><strong>Abteilung: </strong><span class="text-muted">{{$animal->breed->species->department->department}}</span></li>
        <li class="flex-fill w-100"><strong>Telefonnummer: </strong><span class="text-muted">{{$animal->breed->species->department->contact_telefon}}</span></li>
    </ul>
</div>
</div>

<div class="row mb-3"  style="height: 300px">
    <div class="col-sm-6 col-lg-4 p-3" style="height: 100%">
        <img class="rounded w-100" style="height: 100%; object-fit: cover;" src="https://images.pexels.com/photos/2007/animal-dog-pet-cute.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500">
    </div>
    <div class="col-sm-6 col-lg-4 p-3" style="height: 100%">
        <img class="rounded w-100" style="height: 100%; object-fit: cover;" src="https://images.pexels.com/photos/2253275/pexels-photo-2253275.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
    </div>
    <div class="col-sm-6 col-lg-4 p-3" style="height: 100%">
        <img class="rounded w-100" style="height: 100%; object-fit: cover;" src="https://images.pexels.com/photos/3663082/pexels-photo-3663082.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
    </div>
</div>




@endsection