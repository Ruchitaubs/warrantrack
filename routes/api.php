<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CategoryApiController,
    ItemTypeApiController,
    BrandApiController,
    ModelEntryApiController,
    WarrantyApiController,
    UserApplianceApiController,
    AuthController,
    DropdownController
};

// Public auth
Route::post('register', [AuthController::class,'register']);
Route::post('login',    [AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    // Mobile dropdowns & appliances
    Route::get('dropdowns/categories',     [DropdownController::class,'categories']);
    Route::get('dropdowns/item-types',     [DropdownController::class,'items']);
    Route::get('dropdowns/brands',         [DropdownController::class,'brands']);
    Route::get('dropdowns/warranties',     [DropdownController::class,'warranties']);

    Route::apiResource('appliances',       UserApplianceApiController::class)
         ->only(['index','store']);

    // Admin CRUD APIs
    Route::apiResource('categories',       CategoryApiController::class);
    Route::apiResource('item-types',       ItemTypeApiController::class);
    Route::apiResource('brands',           BrandApiController::class);
    Route::apiResource('model-entries',    ModelEntryApiController::class);
    Route::apiResource('warranties',       WarrantyApiController::class);

    // Logout
    Route::post('logout', [AuthController::class,'logout']);
});
