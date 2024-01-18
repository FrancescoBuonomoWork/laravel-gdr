<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Item;
use App\Models\Type;
use Validator;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();
        $types = Type::all();

        return view('index', compact('characters', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $items = Item::all();
        return view('characters.create', compact('types' , 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:characters',
            'bio' => 'required|string|min:10|max:400',
            'attack' => 'required|integer|between:5,99',
            'defense' => 'required|numeric|min:5|max:99',
            'speed' => 'required|numeric|min:5|max:99',
            'hp' => 'required|numeric|min:5|max:99',
            'type_id' => 'required|exists:types,id',
            'items.*' => 'exists:items,id'
        ]);

        $data = $request->all();

        $new_character = Character::create($data);
        if ($request->has('items')) {
            $new_character->items()->attach($data['items']);
        }

        return redirect()->route('characters.show', $new_character);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $character = Character::findOrFail($id);

        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $character = Character::findOrFail($id);
        $items = Item::all();
        $types = Type::all();

        return view('characters.edit', compact('character', 'types', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string|min:5|max:400',
            'attack' => 'required|integer|between:5,99',
            'defense' => 'required|integer|between:5,99',
            'speed' => 'required|integer|between:5,99',
            'hp' => 'required|integer|between:5,99',
            'type_id' => 'required|exists:types,id',
            'items.*' => 'exists:items,id'
        ]);

        $character = Character::findOrFail($id);
        $character->update($validatedData);

        if ($request->has('items')) {
            $character->items()->sync($validatedData['items']);
        } else {
            $character->items()->detach();
        }

        return redirect()->route('characters.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $character = Character::findOrFail($id);
        $character->delete();
        return redirect()->route('homepage');
    }
}
