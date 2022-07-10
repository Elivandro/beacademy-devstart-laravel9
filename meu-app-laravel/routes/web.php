<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostController,
    TeamController,
    UserController,
    ViaCepController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/user/team/{id}", [TeamController::class, 'show'])->name('team.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/users/{id}/posts', [PostController::class, 'show'])->name('posts.show');

Route::delete("/users/{id}/delete", [UserController::class, "destroy"])->name("users.destroy");
Route::put("/users/{id}", [UserController::class, "update"])->name("users.update");
Route::get("/users/{id}/edit", [UserController::class, "edit"])->name("users.edit");
Route::post("/users", [UserController::class, "store"])->name("users.store");
Route::get("/", [UserController::class, "index"])->name("users.index");
Route::get("/users/create", [UserController::class, "create"])->name("users.create");
Route::get("/users/{id}", [UserController::class, "show"])->name("users.show");


//VIACEP WEB SERVICE;
Route::get("/viacep", [ViaCepController::class, "index"])->name("viacep.index");
Route::post("/viacep", [ViaCepController::class, "index"])->name("viacep.index.post");
Route::get("/viacep/{cep}", [ViaCepController::class, "show"])->name("viacep.show");