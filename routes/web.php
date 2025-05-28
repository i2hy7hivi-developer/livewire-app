<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/counter', Counter::class)->name('counter');

Route::get('/first-component', function () {
    \App\Helpers\GeneralHelper::pred('This is a test message from the first component route.');
    return view('first-component');
})->name('first-component');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::prefix('stripe')->name('stripe.')->group(function () {
    Route::view('form', 'stripe.identity.index')->name('stripe.identity.index');
    Route::get('verify-identity', [\App\Http\Controllers\StripeIdentityController::class, 'createVerificationSession'])->name('verify.identity');
    Route::get('verify-identity/callback', [\App\Http\Controllers\StripeIdentityController::class, 'handleCallback'])->name('verify.identity.callback');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
