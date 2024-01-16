<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", function(){
    if(session()->has('user-token')){
        return redirect("/dashboard");
    }else{
        return view("login");
}
})->name('login');


Route::get("/register",  function(){
    if(session()->has('user-token')){
        return redirect("/dashboard");
    }else{
        return view("register");
}
})->name('register');

Route::post("/handle-login",[UserController::class, "handleLogin"]);

Route::post("/handle-register",[UserController::class, "handleRegister"]);

Route::get("/posts", [PostController::class, "getPosts"]);

//route to comment for a post
Route::post("/comment/{post}", [PostController::class], "commentForPost");

