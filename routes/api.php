<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Application\login\Command\LoginCommand;
use App\Application\login\LoginHandler;
use Illuminate\Support\Facades\File;


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

/*
 * convertir imagen a base 64
Route::post('/image', function (Request $request) {
    $fileName = $request->file('filename');
    $img = file_get_contents($fileName->getRealPath());
    return base64_encode($img);
});*/

require __DIR__ . '/Api/User/UserRoutes.php';

// group user
