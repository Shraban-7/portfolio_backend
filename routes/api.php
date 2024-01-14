<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Api\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'Api', 'middleware' => ['api'], 'prefix' => 'v1'],function () {
    Route::get('/portfolio', [FrontendController::class, 'api']);
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.save');
});
