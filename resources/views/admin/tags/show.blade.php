@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <h3>Tag</h3>
            <ul>
                <li>
                    {{ $tag->name }}
                </li>
            </ul>

        </div>
    </div>
@endsection
