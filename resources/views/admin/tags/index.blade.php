@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <h3>Tags list</h3>
            <ul>
                @foreach ($tags as $tag)
                    <li>
                        {{ $tag->name }}
                        <a href="{{ route('admin.tags.show', $tag->id) }}"><button
                                class="btn btn-primary mt-2 mb-2 me-2 text-center">View more</button></a>
                        <a href="{{ route('admin.tags.edit', $tag->id) }}"><button
                                class="btn btn-primary mt-2 mb-2 text-center">Edit</button></a>

                        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="" id="delete">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>



                    </li>
                @endforeach

            </ul>

        </div>
    </div>
@endsection
