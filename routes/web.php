<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelEntryController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\AdminUserApplianceController;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('welcome');
});



// Login form
Route::get('admin/login',  [AdminAuthController::class, 'showLoginForm'])
     ->name('admin.login');

// Form submit
Route::post('admin/login', [AdminAuthController::class, 'login'])
     ->name('admin.login.submit');

// Logout
Route::post('admin/logout',[AdminAuthController::class, 'logout'])
     ->name('admin.logout');

// Dashboard (protected)
Route::get('admin/dashboard', function(){
    return view('admin.dashboard');
})->middleware('admin')
  ->name('admin.dashboard');



  Route::get('admin/users',         [AdminUserController::class,'index'])
     ->name('users.index');
Route::get('admin/users/{user}',  [AdminUserController::class,'show'])
     ->name('users.show');
     
Route::middleware('admin')->group(function(){
Route::resource('categories',      CategoryController::class);
Route::resource('item-types',      ItemTypeController::class);
Route::resource('brands',          BrandController::class);
Route::resource('model-entries',   ModelEntryController::class);
Route::resource('warranties',      WarrantyController::class);
Route::get('user-appliances',      [AdminUserApplianceController::class,'index'])->name('user-appliances.index');


});