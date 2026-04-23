<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

Route::get('/health', function () {
    try {
        // Ping the database
        DB::connection()->getPdo();
        
        return response()->json([
            'status' => 'healthy',
            'database' => 'connected',
            'timestamp' => now()->toIso8601String(),
        ], 200);
        
    } catch (\Exception $e) {
        // Log the failure so you can see it in Log Analytics
        Log::error("Health check failed: ", ['error' => $e->getMessage()]);

        return response()->json([
            'status' => 'unhealthy',
            'database' => 'disconnected',
            'message' => 'Could not connect to the database.'
        ], 500);
    }
});
