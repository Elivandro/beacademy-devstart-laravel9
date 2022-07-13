<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostController,
    TeamController,
    UserController,
    ViaCepController
};

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function (){
    Route::get("/", [UserController::class, "index"])->name("users.index")->middleware('auth');
    Route::get("/users/create", [UserController::class, "create"])->name("users.create")->middleware('auth');
    Route::post("/users", [UserController::class, "store"])->name("users.store")->middleware('auth');
    Route::put("/users/{id}", [UserController::class, "update"])->name("users.update")->middleware('auth');
    Route::get("/users/{id}/edit", [UserController::class, "edit"])->name("users.edit")->middleware('auth');
    Route::get("/users/{id}", [UserController::class, "show"])->name("users.show")->middleware('auth');
    Route::delete("/users/{id}/delete", [UserController::class, "destroy"])->name("users.destroy")->middleware('auth');
    
    Route::get("/user/team/{id}", [TeamController::class, 'show'])->name('team.show')->middleware('auth');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
    Route::get('/users/{id}/posts', [PostController::class, 'show'])->name('posts.show')->middleware('auth');


    Route::get("/viacep", [ViaCepController::class, "index"])->name("viacep.index")->middleware('auth');
    Route::post("/viacep", [ViaCepController::class, "index"])->name("viacep.index.post")->middleware('auth');
    Route::get("/viacep/{cep}", [ViaCepController::class, "show"])->name("viacep.show")->middleware('auth');
});

Route::middleware(['auth', 'admin'])->group(function (){
    route::get('/admin', [UserController::class, 'admin'])->name('admin');
});