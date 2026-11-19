<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\Admin\ApartmentController as AdminApartmentController;
use App\Http\Controllers\Admin\LoginController;

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
Route::get('/wohnungen', [ApartmentController::class, 'index'])->name('page.apartments');
Route::view('/genossenschaft', 'pages.about')->name('page.about');
Route::view('/investition', 'pages.invest')->name('page.invest');
Route::view('/kontakt', 'pages.contact')->name('page.contact');
Route::view('/impressum', 'pages.imprint')->name('page.imprint');
Route::view('/datenschutz', 'pages.privacy')->name('page.privacy');
Route::view('/faq', 'pages.faq')->name('page.faq');
Route::view('/download', 'pages.media')->name('page.download');

/*
 * Apartment status admin. Create a login with: php artisan user:create
 * TEMPORARILY DISABLED for the staging deploy, re-enable by removing the comment markers.
 */
/*
Route::prefix('admin')->group(function () {
  Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->middleware('throttle:6,1');
  });

  Route::middleware('auth')->group(function () {
    Route::get('/', [AdminApartmentController::class, 'index'])->name('admin.apartments.index');
    Route::put('/', [AdminApartmentController::class, 'update'])->name('admin.apartments.update');
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
  });
});
*/
