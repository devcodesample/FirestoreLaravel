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
 
Route::get('/',function (){
 $allFile = FileList::all();
 return view('list', compact(['allFile']));
});

Route::post('add/file',[FirebaseController::class,'store'])->name('file.store');
Route::get('/test',[FirebaseController::class,'index']);
Route::get('/data',[FirebaseController::class,'selectAlldata']);