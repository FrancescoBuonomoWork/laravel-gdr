@extends('layouts/layout')

@section('content')

    <section class="container">
        <div class="row">

            @foreach ($characters as $character)
                <div>
                    <p>{{ $character->name}} </p>
                    <p>{{ $character->bio}} </p>
                    <p>Difesa: {{ $character->defense}} </p>
                    <p>Velocità: {{ $character->speed}} </p>
                    <p>Hp: {{ $character->hp}} </p>
                </div>
            @endforeach
        </div>
    </section>
@endsection