<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AitoolsController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/aitools');
});

Route::resource('categories', CategoriesController::class);
Route::resource('aitools', AitoolsController::class);
Route::resource('tags', TagsController::class);