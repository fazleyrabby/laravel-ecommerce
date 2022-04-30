<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('test', [AdminController::class,'test']);


//Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::match(['get','post'],'login', [AdminController::class, 'login'])->name('login');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'admin'], function(){
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('settings', [AdminController::class, 'edit'])->name('settings');
        Route::post('settings/update', [AdminController::class, 'update'])->name('settings.update');

        Route::get('vendor', [VendorController::class, 'edit'])->name('vendor');
        Route::post('vendor/update', [VendorController::class, 'update'])->name('vendor.update');

        Route::post('password', [AdminController::class, 'updatePassword'])->name('update.password');
    });
});

