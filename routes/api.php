<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Application\login\Command\LoginCommand;
use App\Application\login\LoginHandler;

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

Route::post('/login', function (Request $request) {
    $handle = new LoginHandler();
    return $handle->handle(
        new LoginCommand($request->email, $request->password)
    );
});

// group user
Route::middleware('auth:api')->group(function () {
    Route::post('/user/create', [EmailController::class, 'templateAndData'])->name('email.template');
});
