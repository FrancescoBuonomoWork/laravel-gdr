@extends('layouts.layout')

@section('content')
    <div class="container">
       <form action="" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="Name" type="text">
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
       </form>
    </div>
@endsection