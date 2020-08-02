@extends('layouts.app')

@section('content')


    <h1 class="font-weight-bold mt-3 mb-4">Dashboard</h1>
    <div class="panel">
        
    </div> 

    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (!Auth::guest())
                    <a href="/animals/create" class="btn btn-primary" style="width: fit-content">Tier hinzufügen</a>
                @endif
            </div>
        </div>
    </div>

@endsection