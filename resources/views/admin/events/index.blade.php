@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-header text-center">{{ $event->name }}</div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <p>{{ $event->user->name }}</p>
                            <img src="{{asset("storage/".$event->photo)}}" class="card-photo-top img-fluid" alt="{{ $event->name }}">
                            <p class="mt-2">{{ $event->date }}</p>
                            <p>{{ $event->available_tickets }}</p>
                            @if (count($event->tags) > 0)
                                <ul>
                                    @foreach ($event->tags as $tag)
                                        <li>{{ $tag->name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No tags</p>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.events.show', $event->id) }}"><button
                                    class="btn btn-primary mt-2 mb-2 me-2 text-center">View more</button></a>
                            <a href="{{ route('admin.events.edit', $event->id) }}"><button
                                    class="btn btn-primary mt-2 mb-2 text-center">Edit</button></a>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mb-2 ms-2">
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class=""
                                id="delete">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
