<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Models\FileList;

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

// Route::get('/', function () {
//     return view('welcome');
// });
 
Route::get('/',[FirebaseController::class,'index']); 
Route::post('add/file',[FirebaseController::class,'store'])->name('file.store');  
Route::post('update/file',[FirebaseController::class,'updatefile'])->name('file.update');
Route::get('delete/file/{id}',[FirebaseController::class,'destory']);