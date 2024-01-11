@extends('layouts.app')

@section('content')
    <div class="show-container">
       <form action="{{ route('characters.update', $character->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="Name" type="text" value="{{ old('name', $character->name)}}">
        </div>

        <div>
            <label for="type_id">Class</label>
            <select id="type_id" name="type_id" placeholder="Class"  type="text">

            <option value="" selected>Select Class</option>
            
            @foreach ($types as $type)
            <option @selected( old( 'type_id', $character->type_id ) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach

            </select>
        </div>

        <div>
            <label for="bio">bio</label>
            <textarea name="bio" id="bio" cols="30" rows="10">{{ old('bio', $character->bio) }}</textarea>
        </div>

        <div>
            <label for="defense">defense</label>
            <input id="defense" name="defense" placeholder="defense" type="number" value="{{ old('defense', $character->defense)}}">
        </div>

        <div>
            <label for="speed">speed</label>
            <input id="speed" name="speed" placeholder="speed" type="number" value="{{ old('speed', $character->speed)}}">
        </div>

        <div>
            <label for="hp">hp</label>
            <input id="hp" name="hp" placeholder="hp" type="number" value="{{ old('hp', $character->hp)}}">
        </div>
        <button type="submit">
            Modifica
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