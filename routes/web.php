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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'hmm-group', 'namespace' => 'App\Http\Controllers'], function () {

    Route::get('home','HomeController@home')->name('hmm-group.home');
    Route::get('dashboard', 'HomeController@dashboard')->name('hmm-group.dashboard');
    Route::get('hmm', 'HomeController@hmm')->name('hmm-group.hmm');
    Route::get('attendance', 'HomeController@attendance')->name('hmm-group.attendance');
    Route::get('exam', 'HomeController@exam')->name('hmm-group.exam');
    Route::get('payment', 'HomeController@payment')->name('hmm-group.payment');
    Route::get('setting', 'HomeController@setting')->name('hmm-group.setting');

    // hmm module
    Route::prefix('hmm')->name('hmm.')->group(function () {
        Route::resource('academic', AcademicController::class);
        Route::resource('program', ProgramController::class);

    });

    // payment module
    Route::prefix('payment')->name('payment.')->group(function(){
        Route::resource('description', DescriptionController::class);
        Route::resource('invoice', InvoiceController::class);
        Route::resource('payment', PaymentController::class);
    });
});
