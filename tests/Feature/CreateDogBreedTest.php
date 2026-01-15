<?php

use App\Models\DogBreed;

it('creates a dog breed', function () {
    $payload = DogBreed::factory()->make()->toArray();

    $this->postJson('/api/dog-breeds', $payload)
        ->assertCreated()
        ->assertJsonFragment(['name' => $payload['name']]);

    expect(DogBreed::count())->toBe(1);
});

it('validates input when creating', function () {
    $this->postJson('/api/dog-breeds', [])->assertStatus(422);
});

it('returns created json structure', function () {
    $payload = DogBreed::factory()->make()->toArray();

    $this->postJson('/api/dog-breeds', $payload)
        ->assertJsonStructure(['id','name','origin_country','height_cm','weight_kg','recognized_since']);
});

it('persists the new breed to database', function () {
    $payload = DogBreed::factory()->make(['name' => 'PersistBreed'])->toArray();

    $this->postJson('/api/dog-breeds', $payload)->assertCreated();

    expect(DogBreed::where('name', 'PersistBreed')->exists())->toBeTrue();
});
