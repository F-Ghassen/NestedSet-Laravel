<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleRelationController;
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

Route::prefix('tree')->group(function () {
    Route::post('/createNode', [ArticleRelationController::class, 'createNode']);
    //put
    Route::get('/makeRoot/{id}', [ArticleRelationController::class, 'makeRoot']);
    Route::put('/appendNode', [ArticleRelationController::class, 'appendNode']);
    Route::put('/insertAfter', [ArticleRelationController::class, 'insertAfter']);
    Route::put('/insertBefore', [ArticleRelationController::class, 'insertBefore']);
    //get
    Route::get('/ancestorOf/{id}', [ArticleRelationController::class, 'ancestorOf']);
    Route::get('/ancestorAndSelf/{id}', [ArticleRelationController::class, 'ancestorAndSelf']);
    Route::get('/descendantsOf/{id}', [ArticleRelationController::class, 'descendantsOf']);
    Route::get('/descendantsAndSelf/{id}', [ArticleRelationController::class, 'descendantsAndSelf']);
    Route::get('/ancestorDefaultOrder/{id}', [ArticleRelationController::class, 'ancestorDefaultOrder']);
    Route::get('/getDepth/{id}', [ArticleRelationController::class, 'getDepth']);

});
