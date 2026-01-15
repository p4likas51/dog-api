<?php

use App\Models\DogBreed;

it('lists dog breeds', function () {
    DogBreed::factory()->count(3)->create();

    $this->getJson('/api/dog-breeds')
        ->assertOk()
        ->assertJsonCount(3);
});

it('returns empty array if no breeds', function () {
    $this->getJson('/api/dog-breeds')->assertOk()->assertJson([]);
});

it('shows a single breed', function () {
    $breed = DogBreed::factory()->create();

    $this->getJson('/api/dog-breeds/' . $breed->id)
        ->assertOk()
        ->assertJsonFragment(['id' => $breed->id]);
});


