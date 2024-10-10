<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MinecraftController;
use App\Http\Controllers\AuthorizationController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/start', [MinecraftController::class, 'startServer'])->name('server.start');
Route::post('/stop', [MinecraftController::class, 'stopServer'])->name('server.stop');
Route::get('/status', [MinecraftController::class, 'serverStatus'])->name('server.status');
Route::get('/access-code', function () {
    return response()->json(['access_code' => env('ACCESS_CODE')]);
});
Route::post('/authorize', [AuthorizationController::class, 'authorize']);
