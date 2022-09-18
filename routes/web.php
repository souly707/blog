<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\LoginController as BackendLoginController;
use App\Http\Controllers\Backend\IndexController as BackendIndexController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\Auth\VerificationController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Auth\LoginController as FrontendLoginController;
use App\Http\Controllers\Frontend\IndexController;

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

// Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('frontend.index');

// Frontend Authentication Route
Route::get('/login',                        [FrontendLoginController::class,    'showLoginForm'])->name('show_login_form');
Route::post('/login',                       [FrontendLoginController::class,    'login'])->name('login');
Route::post('/logout',                      [FrontendLoginController::class,    'logout'])->name('logout');
Route::get('/register',                     [RegisterController::class,         'showRegistrationForm'])->name('show_register_form');
Route::post('/register',                    [RegisterController::class,         'register'])->name('register');
Route::get('/password/reset',               [ForgotPasswordController::class,   'showLinkRequestForm'])->name('password.request');
Route::post('/password/email',              [ForgotPasswordController::class,   'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}',       [ResetPasswordController::class,    'showResetForm'])->name('password.reset');
Route::post('/password/reset',              [ResetPasswordController::class,    'reset'])->name('password.update');
Route::post('/email/verify',                [VerificationController::class,     'show'])->name('verification.notice');
Route::post('/email/verify/{id}/{hash}',    [VerificationController::class,     'verify'])->name('verification.verify');
Route::post('/email/resend',                [VerificationController::class,     'resend'])->name('verification.resend');


// Backend Authentication Route
Route::prefix('admin')->group(function () {
    Route::get('/login',                        [BackendLoginController::class,     'showLoginForm'])->name('admin.show_login_form');
    Route::post('/login',                       [BackendLoginController::class,     'login'])->name('admin.login');
    Route::post('/logout',                      [BackendLoginController::class,     'logout'])->name('admin.logout');
});

// Frontend Show Posts
Route::get('/{post}', [IndexController::class, 'post_show'])->name('posts.show');
Route::post('/{post}', [IndexController::class, 'store_comment'])->name('posts.add_comment');
