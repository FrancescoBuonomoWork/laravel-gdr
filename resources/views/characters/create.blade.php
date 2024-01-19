@extends('layouts.app')

@section('content')
    <div class="show-container">
       <form action="{{ route('characters.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" value="{{old('name')}}" name="name" placeholder="Name" type="text">
        </div>
        <div>
            <label for="type_id">Class</label>
            <select id="type_id"  name="type_id" placeholder="Class"  type="text">

            <option value="" selected>Select Class</option>
            
            @foreach ($types as $type)
            <option @selected( old( 'type_id' ) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach

            </select>
        </div>

        <div>
            <label for="bio">Bio (min:10)</label>
            <textarea name="bio" id="bio" cols="30" rows="10">{{ old('bio')}}</textarea>
        </div>

        <div>
            <label for="attack">Attack (5-99)</label>
            <input id="attack" value="{{old('attack')}}" name="attack" placeholder="attack" type="number">
        </div>
        <div>
            <label for="defense">Defense (5-99)</label>
            <input id="defense" value="{{old('defense')}}" name="defense" placeholder="defense" type="number">
        </div>

        <div>
            <label for="speed">Speed (5-99)</label>
            <input id="speed" value="{{old('speed')}}" name="speed" placeholder="speed" type="number">
        </div>

        <div>
            <label for="hp">HP (5-99)</label>
            <input id="hp" value="{{old('hp')}}" name="hp" placeholder="hp" type="number">
        </div>
        @foreach ($items as $item)
        <div class="item_list">             
            <input type="checkbox" name="items[]" id="item-{{ $item->id }}" value="{{ $item->id }}" @checked(in_array($item->id, old('items', [])))>
            <label for="item-{{ $item->id}}">{{ $item->name}}</label>           
        </div>
            @endforeach
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