<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_character = Character::create($data);

        return redirect()->route('characters.show', $new_character->id);
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
        return view('characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string|min:5|max:400',
            'defense' => 'required|integer|between:5,99',
            'speed' => 'required|integer|between:5,99',
            'hp' => 'required|integer|between:5,99',
        ]);

        $character = Character::findOrFail($id);
        $character->update($validatedData);

        return redirect()->route('characters.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
