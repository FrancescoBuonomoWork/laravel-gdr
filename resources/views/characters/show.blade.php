@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="character-card">
                <p class="bio">{{ $character->name}} </p>
                <p class="attribute">{{ $character->bio}} </p>
                <p class="bio">{{ $character->type?->name}} </p>
                <p class="bio">{{ $character->type->description ?? 'N.A.'}} </p>
                <p class="attribute">Attack: {{ $character->attack}} </p>
                <p class="attribute">Difesa: {{ $character->defense}} </p>
                <p class="attribute">Velocità: {{ $character->speed}} </p>
                <p class="attribute">Hp: {{ $character->hp}} </p>
                @foreach ($character->items as $item)
                <p class="attribute">Weapon: {{ $item->name }}</p>
                <ul class="items_list">
                    <li class="bio">Quality: {{ $item->quality }}</li>
                    <li class="bio">Item Level: {{ $item->item_level }}</li>
                    <li class="bio">Damage: {{ $item->damage }}</li>
                </ul>                    
                @endforeach
            </div>
        </div>
    </div>
@endsection
