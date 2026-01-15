<?php

use App\Models\DogBreed;

it('deletes a dog breed', function () {
    $breed = DogBreed::factory()->create();

    $this->deleteJson('/api/dog-breeds/' . $breed->id)->assertNoContent();

    expect(DogBreed::where('id', $breed->id)->exists())->toBeFalse();
});

it('returns 404 when deleting missing breed', function () {
    $this->deleteJson('/api/dog-breeds/99999')->assertNotFound();
});

it('after delete the resource cannot be retrieved', function () {
    $breed = DogBreed::factory()->create();

    $this->deleteJson('/api/dog-breeds/' . $breed->id)->assertNoContent();

    $this->getJson('/api/dog-breeds/' . $breed->id)->assertNotFound();
});

it('reduces total count after delete', function () {
    DogBreed::factory()->count(2)->create();
    $breed = DogBreed::first();

    $this->deleteJson('/api/dog-breeds/' . $breed->id)->assertNoContent();

    expect(DogBreed::count())->toBe(1);
});
