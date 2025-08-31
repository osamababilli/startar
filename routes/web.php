<?php

use App\Livewire\Roles\Create;
use App\Livewire\Roles\EditRole;
use Livewire\Volt\Volt;
use App\Livewire\Roles\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // roles & permissions routes
    Route::get('roles', Index::class)->name('roles.index');
    Route::get('roles/create', Create::class)->name('roles.create');
    Route::get('roles/edit/{role}', EditRole::class)->name('roles.edit');
});

require __DIR__ . '/auth.php';
