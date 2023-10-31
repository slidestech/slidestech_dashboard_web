<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;

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
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});


// route for creating new user
Route::post('/create', function (Request $request) {
    $user = new User();
    $user->username = 'abdellatif';
    $user->fullname = 'AbdellatifESSELAMI';
    $user->address = 'Al Ain';
    $user->telephone = '0545747881';
    $user->email = 'abdellatif@slidestech.ae';
    $user->commune_id = 1;
    $user->structure_id = 1;
    $user->password = Hash::make('qwerty');
    $user->save();
    $token = $user->createToken('slidestech-dashboard')->plainTextToken;
    $user->assignRole(1);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout');