<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::view('/', 'pages.project')->name('page.project');
Route::view('/genossenschaft', 'pages.about')->name('page.about');
Route::view('/investition', 'pages.invest')->name('page.invest');
Route::view('/kontakt', 'pages.contact')->name('page.contact');
Route::view('/impressum', 'pages.imprint')->name('page.imprint');
Route::view('/datenschutz', 'pages.privacy')->name('page.privacy');
Route::view('/finanzierungsmoeglichkeiten', 'pages.finance')->name('page.finance');






