@extends('layouts.admin')

@section('content')
    <div class="">
        <div class="container">
            <div class="row">
                <h2 class="">Edit Event</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                <form action="{{ route('admin.events.update', $event->id) }}" method="POST" class="">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') ?? $event->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="text" class="form-control @error('date') is-invalid @enderror" id="date"
                            name="date" value="{{ $event->date }}">
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="available_tickets" class="form-label">Available tickets</label>
                        <input type="text" class="form-control @error('available_tickets') is-invalid @enderror"
                            id="available_tickets" name="available_tickets"
                            value="{{ old('available_tickets') ?? $event->available_tickets }}">
                        @error('available_tickets')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="technologies" class="form-label">Tags</label>
                        <select multiple name="tags[]" id="tags" class="form-select">
                            <option value="">No tags</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" @selected(in_array($tag->id, $event->tags->pluck('id')->toArray()))>{{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
