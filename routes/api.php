<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AnswerController;
use App\Http\Controllers\Api\InvitationController;
use App\Http\Controllers\Api\QuestionnaireController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/questionnaire',[QuestionnaireController::class,'store']);
    Route::get('/questionnaire',[QuestionnaireController::class,'index']);
    Route::post('/invite/{id}',[InvitationController::class,'invite']);
});
Route::post('/login',[AuthController::class,'login']);
Route::get('/check-token/{token}',[InvitationController::class,'check'])->name('check');
Route::post('/answer',[AnswerController::class,'store']);