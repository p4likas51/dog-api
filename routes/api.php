<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogBreedController;

Route::apiResource('dog-breeds', DogBreedController::class);
