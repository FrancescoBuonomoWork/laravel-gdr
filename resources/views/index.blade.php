@extends('layouts/layout')

@section('content')

    <section class="container">
        <div class="row">

            @foreach ($characters as $character)
            <a href="{{route('characters.show', $character->id)}}">
                <div class="character-card">
                    <p class="bio">{{ $character->name}}</p>
                    <p class="attribute">{{ $character->bio}} </p>
                    <p class="attribute">Difesa: {{ $character->defense}} </p>
                    <p class="attribute">Velocità: {{ $character->speed}} </p>
                    <p class="attribute">Hp: {{ $character->hp}} </p>
                    <div>
                        <a href="{{ route('characters.edit', $character->id) }}"><button>Edit</button></a>
                        <form action="{{route('characters.destroy', $character->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                        
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
@endsection