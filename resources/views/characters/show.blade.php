@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="character-card">
                <p class="bio">{{ $character->name}} </p>
                <p class="attribute">{{ $character->bio}} </p>
                <p class="bio">{{ $character->type?->name}} </p>
                <p class="bio">{{ $character->type->description ?? 'N.A.'}} </p>
                <p class="attribute">Difesa: {{ $character->defense}} </p>
                <p class="attribute">Velocità: {{ $character->speed}} </p>
                <p class="attribute">Hp: {{ $character->hp}} </p>
            </div>
        </div>
    </div>
@endsection
