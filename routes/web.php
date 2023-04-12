<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RevisorController;
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

Route::get('/dettaglio/annuncio/{announcement}' , [AnnouncementsController::class, 'showAnnouncement'])->name('announcements.show');

Route::get('/tutti/annunci' , [AnnouncementsController::class, 'indexAnnouncement'])->name('announcements.index');

// Home revisore
Route::get('/revisor/home' , [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//  Accetta annuncio 

Route::patch('/accetta/annuncio/{announcement}' , [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

// Rifiuta Annuncio
Route::patch('/rifiuta/annuncio/{announcement}' , [RevisorController::class,'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

// Chiedi di diventare revisore

Route::get('/richiesta/revisore' , [RevisorController::class , 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// Rendi utente revisore

Route::get('/rendi/revisore/{user}' , [RevisorController::class , 'makeRevisor'])->name('make.revisor');

// Ricerca annuncio

Route::get('/ricerca/annuncio' , [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

// Lingua

Route::post('/lingua/{lang}' , [FrontController::class, 'setLanguage'])->name('setLocale');