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
            <label for="bio">Bio (min:10)</label>
            <textarea name="bio" id="bio" cols="30" rows="10">{{ old('bio', $character->bio) }}</textarea>
        </div>

        <div>
            <label for="attack">Attack (5-99)</label>
            <input id="attack" name="attack" placeholder="attack" type="number" value="{{ old('attack', $character->attack)}}">
        </div>

        <div>
            <label for="defense">Defense (5-99)</label>
            <input id="defense" name="defense" placeholder="defense" type="number" value="{{ old('defense', $character->defense)}}">
        </div>

        <div>
            <label for="speed">Speed (5-99)</label>
            <input id="speed" name="speed" placeholder="speed" type="number" value="{{ old('speed', $character->speed)}}">
        </div>

        <div>
            <label for="hp">HP (5-99)</label>
            <input id="hp" name="hp" placeholder="hp" type="number" value="{{ old('hp', $character->hp)}}">
        </div>
        @foreach ($items as $item)
        <div class="item_list">
            <input type="checkbox" name="items[]" id="item-{{ $item->id }}" value="{{ $item->id }}" @checked(in_array($item->id, old('items', $character->items->pluck('id')->all())))>
            <label for="item-{{ $item->id}}">{{ $item->name}}</label>                       
        </div>
            @endforeach
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