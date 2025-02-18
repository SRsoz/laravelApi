<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ChatHistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[Authcontroller::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout'])->middleware('auth:sanctum');
route::post('/chat',[ChatbotController::class, 'chat'])->middleware('auth:sanctum');
route::post('/chat',[ChatHistoryController::class, 'chat'])->middleware('auth:sanctum');

Route::post('/test', function (Request $request) {
    $data = $request->test;

    dump($data);

    return response()->json(['Message'=> "Incoming date was: $data"]);
});

Route::get('/getRouteTest', function (Request $request){
    $request->validate([
        'test' => 'required | string',
    ]);
    try {
        if(true) {
            throw new Exception("There will be an error");
        }

        return response()->json(['message'=> "Hello Api!"]);
    } catch (\Exception $e) {
        return response()->json(['message'=> "Server Error"], 500);
    }
}); 