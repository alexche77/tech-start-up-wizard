<?php

use App\Http\Controllers\StartUpController;
use App\Jobs\SetupDreamTeam;
use App\Models\StartUp;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:web'])->group(function () {
    Route::post('/startup/{startup}/sync', function ($startUpId) {
        \Illuminate\Support\Facades\Log::info('Sync');
        SetupDreamTeam::dispatch(StartUp::find($startUpId));
        return back();
    })->name('startup_sync');
    Route::resource('/startup', StartUpController::class);

});


require __DIR__ . '/auth.php';
