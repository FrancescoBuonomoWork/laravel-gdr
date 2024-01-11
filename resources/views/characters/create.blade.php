@extends('layouts.app')

@section('content')
    <div class="show-container">
       <form action="{{ route('characters.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="Name" type="text">
        </div>
        <div>
            <label for="type_id">Class</label>
            <select id="type_id" name="type_id" placeholder="Class"  type="text">

            <option value="" selected>Select Class</option>
            
            @foreach ($types as $type)
            <option @selected( old( 'type_id' ) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach

            </select>
        </div>

        <div>
            <label for="bio">bio</label>
            <textarea name="bio" id="bio" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="defense">defense</label>
            <input id="defense" name="defense" placeholder="defense" type="number">
        </div>

        <div>
            <label for="speed">speed</label>
            <input id="speed" name="speed" placeholder="speed" type="number">
        </div>

        <div>
            <label for="hp">hp</label>
            <input id="hp" name="hp" placeholder="hp" type="number">
        </div>
        <button type="submit">
            Crea
        </button>
       </form>
       <div>
           @if ($errors->any())
        <div >
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        </div>


    </div>
@endsection