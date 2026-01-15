<?php

use App\Models\DogBreed;

it('deletes a dog breed', function () {
    $breed = DogBreed::factory()->create();

    $this->deleteJson('/api/dog-breeds/' . $breed->id)->assertNoContent();

    expect(DogBreed::where('id', $breed->id)->exists())->toBeFalse();
});


