<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', function (Request $request) {
    return new JsonResponse(
        ['error' => ['message' => 'Not implemented yet!']],
        JsonResponse::HTTP_METHOD_NOT_ALLOWED
    );
})->name(ProductController::ROUTE_LIST);

Route::get('/products/{id}', function (Request $request, string $id) {
    return new JsonResponse(
        ['error' => ['message' => 'Not implemented yet!']],
        JsonResponse::HTTP_METHOD_NOT_ALLOWED
    );
})->name(ProductController::ROUTE_SHOW);

Route::post('/products', 'ProductController@createProduct')->name(ProductController::ROUTE_CREATE);
