<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DogBreed;

class DogBreedController extends Controller
{
    public function index()
    {
        return DogBreed::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'origin_country' => 'required|string',
            'height_cm' => 'required|integer',
            'weight_kg' => 'required|integer',
            'recognized_since' => 'required|integer',
        ]);

        return DogBreed::create($data);
    }

    public function show(DogBreed $dogBreed)
    {
        return $dogBreed;
    }

    public function update(Request $request, DogBreed $dogBreed)
    {
        $dogBreed->update($request->all());
        return $dogBreed;
    }

    public function destroy(DogBreed $dogBreed)
    {
        $dogBreed->delete();
        return response()->noContent();
    }
}

