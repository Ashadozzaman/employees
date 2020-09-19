<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/get/employees/',[ApiController::class,'get_employees']);
Route::get('/get/companies/',[ApiController::class,'get_companies']);
Route::get('/get/employee/{id}',[ApiController::class,'get_employee']);
Route::get('/get/employee/details/{id}/',[ApiController::class,'employee_details']);
Route::post('/add/employee',[ApiController::class,'createEmployee']);
Route::put('/edit/employee/{id}/',[ApiController::class,'editEmployee']);
Route::delete('/delete/employee/{id}/',[ApiController::class,'deleteEmployee']);
