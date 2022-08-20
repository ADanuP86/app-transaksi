<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;

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

Route::get('/', [Home::class, 'index']);

Route::get('/export_excel', [Home::class, 'export_excel']);

Route::get('/tambah', [Home::class, 'tambah']);

Route::post('/store', [Home::class, 'store']);

Route::get('/edit/{id}', [Home::class, 'edit']);

Route::post('/update', [Home::class, 'update']);

Route::get('/hapus/{id}', [Home::class, 'hapus']);

Route::get('/report', [Home::class, 'report']);
