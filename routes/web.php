<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ShippmentController;
use App\Http\Controllers\UnitController;
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

Route::get('/', function () { return view('signup'); })->name('index');
// Route::get('/', function () { return view('signin'); })->name('index');

Route::get('/register', function () { return view('signup');});


Route::prefix('api')->group( function () {
    Route::post('/signin', [AuthController::class, 'login']);
    Route::get('/signout', [AuthController::class, 'logout']);
    Route::post('/add-user', [AuthController::class, 'store']);
    Route::get('/change-admin-status/{user_id}', [AuthController::class, 'changeStatus']);
    Route::get('/delete-admin/{user_id}', [AuthController::class, 'delete']);
    Route::post('/update-user', [AuthController::class, 'updateProfile']);
    Route::post('/update-password', [AuthController::class, 'updatePassword']);
    Route::post('/assign-user', [AuthController::class, 'assignUser']);


    Route::post('/add-unit', [UnitController::class, 'store']);
    Route::get('/delete-unit/{id}', [UnitController::class, 'delete']);


    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete']);


    Route::post('/add-shippment', [ShippmentController::class, 'store']);
    Route::get('/approve-shippment/{id}', [ShippmentController::class, 'approve']);
    Route::get('/reject-shippment/{id}', [ShippmentController::class, 'reject']);

    

});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard',  [PagesController::class, 'dashboard']);
    Route::get('/settings',  [PagesController::class, 'settings']);
    Route::get('/logs',  [PagesController::class, 'logs']);

    Route::get('/view-admins',  [PagesController::class, 'viewAdmins']);
    Route::get('/view-admin/{user_id}',  [PagesController::class, 'viewAdmin']);

    Route::get('/view-units',  [PagesController::class, 'viewUnits']);
    Route::get('/view-categories',  [PagesController::class, 'viewCategories']);


    Route::get('/view-logistics',  [PagesController::class, 'viewLogistics']);
    Route::get('/view-logistic/{user_id}',  [PagesController::class, 'viewLogistic']);

    

});

