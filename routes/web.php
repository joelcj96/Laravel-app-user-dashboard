<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', [UserController::class, 'about'])->name('about.index');

Route::get('/contact', [UserController::class, 'contact'])->name('contact.index');

Route::get('/dashboard', function () {

    $users = User::all();
    return view('dashboard', ['users' => $users]);
})->middleware(['auth', 'verified'])->name('dashboard');

// CATEGORY ROUTE
Route::get('/category/all',[categoryController::class, 'allcat'])->name('category.index');

// STORE ROUTE
Route::post('/category/add', [categoryController::class, 'addcat'])->name('store.category');


// EDIT ROUTE
Route::get('/category/edit/{id}', [categoryController::class, 'edit']);

// UPDATE ROUTE
Route::put('/update/{id}',[categoryController::class, 'update']);

// DELETE ROUTE
Route::delete('/category/all/{id}', [categoryController::class, 'delete']);



// FOR MY BRANDS
Route::get('/brand/all', [BrandController::class, 'brand'])->name('brand.index');

Route::post('/brand/add', [BrandController::class, 'addBrand'])->name('store.brand');

// EDIT ROUTE
Route::get('/brand/edit/{id}', [BrandController::class, 'editBrand']);

// UPDATE ROUTE
Route::post('/brand/update/{id}',[categoryController::class, 'update']);


/// FOR MY MULTI PICTURES
Route::get('/multi/images', [MultiController::class, 'multiPic'])->name('multi.index');

// STORE ROUTE
Route::post('/store', [MultiController::class, 'storeImage'])->name('store.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
