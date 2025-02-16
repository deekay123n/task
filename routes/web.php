<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


 Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('list');
    Route::get('/add', [UserController::class, 'form'])->name('add');
    Route::post('/save', [UserController::class, 'submit'])->name('submit');
    Route::get('/edit/{id}', [UserController::class, 'form'])->name('edit');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::get('/import-contacts', [UserController::class, 'importform'])->name('import-contacts');
    Route::post('/import-contacts-xml', [UserController::class, 'importXML'])->name('import-xml');
});
