@extends('layouts.app')

@section('content')


    <h1>Dashboard</h1>
    <div class="panel">
        
    </div> 

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!Auth::guest())
                            <a href="/animals/create" class="btn btn-primary" style="width: fit-content">Tier hinzufügen</a>
                        @endif
    
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection