<?php

use App\Livewire\Soporte\DetalleTicket;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/chat', function () {
    return view('cliente.chat');
})->name('home');


// RUTAS ADMIN
Route::view('dashboardAdministrador', 'admin.dashboard')
    ->middleware(['auth', 'verified', 'rol.admin'])
    ->name('admin.dashboard');

Route::view('usuarios', 'admin.usuarios')
    ->middleware(['auth', 'verified', 'rol.admin'])
    ->name('usuarios');

Route::view('tickets', 'admin.tickets')
    ->middleware(['auth', 'verified'])
    ->name('tickets');

Route::view('nuevoTicket', 'cliente.nuevoTicket')
    ->middleware(['auth', 'verified'])
    ->name('nuevoTicket');

Route::get('/detalleTicket/{ticketId}', DetalleTicket::class)
    ->middleware(['auth', 'verified'])
    ->name('detalleTicket');



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
