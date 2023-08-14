<?php

use App\Http\Controllers\AssignWorkController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\RequestServiceController;
use App\Http\Controllers\Technicains\technicainsController;
use App\Http\Controllers\user\profileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('changename',[profileController::class,'changeUserName']);
Route::post("requestservice",[RequestServiceController::class,'requestService']);
Route::get("getTotalRequest/{user_id}",[RequestServiceController::class,'getTotalRequest']);
Route::get("totalpendingrequest/{user_id}",[RequestServiceController::class,'getTotalPendingRequest']);
Route::get("totalacceptedrequest/{user_id}",[RequestServiceController::class,'getTotalAcceptedRequest']);
Route::get("getTotalRequests/{user_id}",[RequestServiceController::class,'getTotalRequests']);

Route::get("checkrequeststatus/{requestid}",[RequestServiceController::class,'checkReqeustStatus']);
Route::get("getTotalRequest",[RequestServiceController::class,'getAllRequests']);

Route::get("getTotalRequestCount",[RequestServiceController::class,'getAllRequestsCount']);
Route::get("getTechnicains",[technicainsController::class,'getAllTechnicains']);
Route::post('assignwork',[AssignWorkController::class,'assignWork']);

Route::get("getworkorder",[AssignWorkController::class,'getWorderOrder']);
Route::get("changeStatus/{id}",[RequestServiceController::class,'changeStatus']);
Route::get("assignwork",[AssignWorkController::class,'getAssignedWork']);

Route::get("getalltechinicainscount",[technicainsController::class,'getAllTechnicainsCount']);
Route::get("getAllUsers",[RequestServiceController::class,'getAllUsers']);

Route::post("contactus",[ContactUsController::class,"contactUs"]);
Route::get("getcontactus",[ContactUsController::class,"getAllContacts"]);
