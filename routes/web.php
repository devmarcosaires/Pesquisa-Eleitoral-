<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

    Route::resources([
        'roles' => App\Http\Controllers\Admin\RoleController::class,
        'users' => App\Http\Controllers\Admin\UserController::class,
        'states' => App\Http\Controllers\Admin\StateController::class,
        'cities' => App\Http\Controllers\Admin\CityController::class,
        'mandates' => App\Http\Controllers\Admin\MandatesController::class,
    ]);
});

require __DIR__ . '/auth.php';
