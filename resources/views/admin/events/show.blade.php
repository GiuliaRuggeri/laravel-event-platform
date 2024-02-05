@extends('layouts.admin')

@section('content')

<div class="col-md-4">
    <div class="card mt-2">
        <div class="card-header text-center">{{ $event->name }}</div>
        <div class="card-body d-flex flex-column align-items-center">
            <p class="mt-2">{{ $event->date }}</p>
            <p class="mt-2">{{ $event->available_tickets }}</p>
         
        </div>
    </div>
</div>
@endsection