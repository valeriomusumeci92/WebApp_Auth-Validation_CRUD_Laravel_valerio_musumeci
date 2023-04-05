<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnnouncementsController;

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

Route::get('/', [FrontController::class , 'welcome'])->name('welcome');

Route::get('/nuovo/annuncio', [AnnouncementsController::class , 'createAnnouncement'])->middleware('auth')->name('announcements.create');

Route::get('/categoria/{category}', [FrontController::class , 'categoryShow'])->name('categoryShow');