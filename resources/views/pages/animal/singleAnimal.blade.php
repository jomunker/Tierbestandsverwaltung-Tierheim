@extends('layouts.app')

@section('content')

<div class="row mb-3" style="height: 300px;">
        <div class="col-6 d-none d-block w-100" style="height: 100%;">
            <img class="rounded w-100" style="object-fit: cover; height: 100%;" src="https://images.pexels.com/photos/2007/animal-dog-pet-cute.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500">
        </div>
        <div class=" col-6 pr-3 pl-3 d-flex flex-column position-static" style="height: 100%;">
          <ul class="list-unstyled d-flex flex-column" style="margin: 0; height: 100%">
              <li class="flex-fill w-100"><strong>Geschlecht: </strong><span class="text-muted">männlich</span></li>
              <li class="flex-fill w-100"><strong>Rasse: </strong><span class="text-muted">Golden Retriever</span></li>
              <li class="flex-fill w-100"><strong>Alter: </strong><span class="text-muted">4</span></li>
              <li class="flex-fill w-100"><strong>Größe: </strong><span class="text-muted">groß</span></li>
              <li class="flex-fill w-100"><strong>Im Tierheim seit: </strong><span class="text-muted">17. Oktober 2019</span></li>
              <li class="flex-fill w-100"><strong>Kastriert: </strong><span class="text-muted">Ja</span></li>
              <li class="flex-fill w-100"><strong>Vermittelt: </strong><span class="text-muted">Nein</span></li>
          </ul> 
        </div>
</div>
<div class="ml-auto mr-auto mt-5 mb-5" >
    <h1 class="text-center">Hi, ich bin Tom!</h1>
    <p class="mt-3 w-100 text-justify" style="column-count: 2; width: 50%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, quibusdam, distinctio illum commodi provident repellat fuga incidunt consequatur cupiditate officia consectetur tempora laborum, animi ratione minus reprehenderit iusto praesentium expedita? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil tenetur, excepturi inventore iusto necessitatibus sapiente, recusandae modi velit et facilis eius similique architecto tempora accusamus dolorum dolore nam maiores minus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo blanditiis dolor, libero iusto cumque aliquam culpa et dicta veniam obcaecati ipsum voluptas necessitatibus hic, inventore nostrum minus unde fugit sequi!</p>
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