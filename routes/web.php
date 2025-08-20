<?php

use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::view('subject', 'subject')
    ->middleware(['auth', 'verified'])
    ->name('subject');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Volt::route('settings/languages', 'settings.languages')->name('settings.languages');
});

Route::get('change', [LocalizationController::class, 'change'])
    ->name('lang.change');

require __DIR__.'/auth.php';
