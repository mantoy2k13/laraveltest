<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostAjaxController;
use App\Http\Controllers\AjaxBOOKCRUDController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
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
//     $data['title'] = 'Cebu Tours';
//     return view('welcome', $data); 
// });

// Route::get('/','SearchController@index');
// Route::get('/search','SearchController@search');
Route::get('/', [SearchController::class, 'index']);
// or
Route::get('search', [SearchController::class, 'search']);
Route::resource('/ajaxposts',PostAjaxController::class);


Route::get('ajax-book-crud', [AjaxBOOKCRUDController::class, 'index']);
Route::post('add-update-book', [AjaxBOOKCRUDController::class, 'store']);
Route::post('edit-book', [AjaxBOOKCRUDController::class, 'edit']);
Route::post('delete-book', [AjaxBOOKCRUDController::class, 'destroy']);
Route::resource('users', ContactController::class);