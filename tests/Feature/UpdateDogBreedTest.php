<?php

use App\Models\DogBreed;

it('updates a dog breed', function () {
    $breed = DogBreed::factory()->create(['name' => 'OldName']);

    $this->putJson('/api/dog-breeds/' . $breed->id, ['name' => 'NewName'])
        ->assertOk()
        ->assertJsonFragment(['name' => 'NewName']);

    expect(DogBreed::find($breed->id)->name)->toBe('NewName');
});

it('returns 404 when updating missing breed', function () {
    $this->putJson('/api/dog-breeds/99999', ['name' => 'Nope'])->assertNotFound();
});

it('allows partial updates (patch)', function () {
    $breed = DogBreed::factory()->create(['origin_country' => 'OldCountry']);

    $this->patchJson('/api/dog-breeds/' . $breed->id, ['origin_country' => 'NewCountry'])
        ->assertOk()
        ->assertJsonFragment(['origin_country' => 'NewCountry']);

    expect(DogBreed::find($breed->id)->origin_country)->toBe('NewCountry');
});

it('persists updates to database', function () {
    $breed = DogBreed::factory()->create(['weight_kg' => 20]);

    $this->putJson('/api/dog-breeds/' . $breed->id, ['weight_kg' => 30])->assertOk();

    expect(DogBreed::find($breed->id)->weight_kg)->toBe(30);
});