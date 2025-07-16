<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InstrumentCategoryController;
use App\Http\Controllers\Admin\InstrumentController;
use App\Http\Controllers\Admin\StudioController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('customer.dashboard');
})->middleware(['auth', 'verified'])->name('redirect.dashboard');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('categories', InstrumentCategoryController::class)->except(['show']);
        Route::resource('instruments', InstrumentController::class)->except(['show']);
        Route::resource('studios', StudioController::class)->except(['show']);

        Route::get('categories/pdf', [ExportController::class, 'exportCategoriesPdf'])->name('export.categories.pdf');
        Route::get('instruments/pdf', [ExportController::class, 'exportInstrumentsPdf'])->name('export.instruments.pdf');
        Route::get('studios/pdf', [ExportController::class, 'exportStudiosPdf'])->name('export.studios.pdf');
    });

Route::middleware(['auth', 'verified'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::resource('instruments', \App\Http\Controllers\Customer\InstrumentController::class)->only(['index', 'show']);

        Route::resource('studios', \App\Http\Controllers\Customer\StudioController::class);

    });

require __DIR__.'/auth.php';
