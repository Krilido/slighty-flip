<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth/login');
});

Route::get('logout', function () {
    return view('auth/login');
})->name('logout');

Route::post('do_login', 'Auth\LoginController@login')->name('do_login');

Route::resource('dashboard', 'DashboardController',
[
    'names' => [
        'index' => 'dashboard',
        'create' => 'dashboard.create',
        'show' => 'dashboard.show',
        'edit' => 'dashboard.edit',
    ]
]);

Route::resource('disbursement', 'DisbursementController',
[
    'names' => [
        'index' => 'disbursement',
        'create' => 'disbursement.create',
        'show' => 'disbursement.show',
        'edit' => 'disbursement.edit',
    ]
]);

Route::get('disbursement/sync/{id}', 'DisbursementController@sync')->name('disbursement.sync');
