<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MatrixkeputusanController;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\SkalaController;
use App\Http\Controllers\VmatrixkeputusanController;
use App\Http\Controllers\VnormalisasiController;
use App\Http\Controllers\Vranking;
use App\Models\Alternatif;
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
    return view('form/formalternatif');
});

Route::post('/alternatif', [AlternatifController::class, 'create']);

Route::get('/bobot', [KriteriaController::class, 'show']);
Route::post('/bobot', [BobotController::class, 'create']);

Route::get('/kriteria', function () {
    return view('form/formkriteria');
});

Route::post('/kriteria', [KriteriaController::class, 'create']);

Route::get('/matrix', [MatrixkeputusanController::class, 'show']);
Route::post('/matrix', [MatrixkeputusanController::class, 'create']);

Route::get('/skala', function () {
    return view('form/formskala');
});

Route::post('/skala', [SkalaController::class, 'create']);

Route::get('/dtalternatif', [AlternatifController::class, 'index']);
Route::get('/dtbobot', [BobotController::class,'index']);
Route::get('/dtkriteria',[KriteriaController::class, 'index']);
Route::get('/dtmatrix', [MatrixkeputusanController::class, 'index']);
Route::get('/dtskala',[SkalaController::class, 'index']);

Route::get('/detailmatrix', [VmatrixkeputusanController::class, 'index']);
Route::get('/normalisasi', [VnormalisasiController::class, 'index']);
Route::get('/ranking', [Vranking::class, 'index']);
