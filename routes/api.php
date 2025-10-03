<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v1\CompanyController;

Route::prefix('v1')->group(function () {
    Route::apiResource('companies', CompanyController::class);
});
