<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Services;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\EmployeeController;
use App\Livewire\Admin\Employees;
use App\Http\Controllers\SiteController;



Route::get('/', [SiteController::class, 'home'])
    ->name('site.home');
/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');



/*
|--------------------------------------------------------------------------
| Protected admin routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', Dashboard::class)->name('admin');
    Route::get('/admin/employees', Employees::class)->name('employees');
    Route::get('/admin/services', Services::class)->name('services');
});


/*
|--------------------------------------------------------------------------
| Authentication routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';