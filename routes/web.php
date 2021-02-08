<?php

use App\Http\Controllers\StartUpController;
use App\Jobs\SetupDreamTeam;
use App\Models\StartUp;
use Illuminate\Support\Facades\Log;
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
        Log::info('Sync');
        $startUp = StartUp::find($startUpId);
        if ($startUp->sync_in_progress) {
            Log::alert("Tried to sync a startup that is already syncing.");
            return back()->with('error', 'We are currently finding the best team for ' . $startUp->name . ", we will finish in a few moments");
        }
        SetupDreamTeam::dispatch($startUp);
        return back();
    })->name('startup_sync');
    Route::resource('/startup', StartUpController::class);

});


require __DIR__ . '/auth.php';
