<?php

use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\Admin\UndanganController;
use App\Http\Controllers\Admin\GaleriController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::controller(UserController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('user', 'index')->name('get.user');
});

Route::controller(PaymentController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('konfirmasi', 'index')->name('payment.konfir');
    Route::get('selesai', 'index')->name('payment.selesai');
    Route::get('riwayatlangganan', 'index')->name('riwayat');
    Route::get('langganan', 'berlangganan')->name('berlangganan');
    Route::get('pesan', 'create')->name('payment.create');
    Route::post('pesan', 'store')->name('post.pesan');
    Route::post('pembayaran', 'imagePayment')->name('image.payment');
    Route::post('konfirmasi', 'konfirmasi')->name('konfirmasi');
});

Route::middleware(['auth'])->group(function () {

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

Route::resource('undangan', UndanganController::class)->except('show')->middleware(['auth', 'verified']);
Route::resource('undangan.galeri', GaleriController::class)->shallow()->only(['store'])->middleware(['auth', 'verified']);
Route::get('show/{slug}', [UndanganController::class, 'show'])->name('undangan.public.show');

Route::get('tmplt', function () {
    return view('template/template1');
})->name('user');

require __DIR__ . '/auth.php';
