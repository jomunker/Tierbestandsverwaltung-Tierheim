{{-- check for errors when validating--}}
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger w-100 d-flex">
            {{ $error }}
        </div>
    @endforeach
@endif

{{-- check for session successes --}}
@if(session('success'))
    <div class="alert alert-success w-100 d-flex">
        {{session('success')}}
    </div>
@endif

{{-- check for session errors --}}
@if(session('error'))
    <div class="alert alert-danger w-100 d-flex">
        {{session('error')}}
    </div>
@endif