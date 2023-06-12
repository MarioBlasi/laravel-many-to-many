<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

// Route::get('/admin', function () {
//     return view('admin');
// })->name('admin');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [PageController::class, 'index'])->name('dashboard');
    Route::resource('posts',PageController::class)->parameters(['posts' => 'post:slug']);
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/create', function () {
    return view('posts.admin.create');
})->name('admin.create');

Route::get('/admin/dashboard', function () {
    return view('posts.admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/edit', function () {
    return view('posts.admin.edit');
})->name('admin.edit');

Route::get('/admin/index', function () {
    return view('posts.admin.index');
})->name('admin.index');

Route::get('/admin/show', function () {
    return view('posts.admin.show');
})->name('admin.show');




require __DIR__.'/auth.php';