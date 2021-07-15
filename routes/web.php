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

Auth::routes();


//Putmining
Route::get('/home', 'PMController@pageHome')->name('home');
Route::get('/disclaimer', 'PMController@pageDisclaimer')->name('disclaimer');
Route::post('/headerform', 'PMController@headerform');
Route::get('/public_blog', 'PMController@pagePublicBlog');  

//Email
Route::get('/email-verify/{link}', 'EmailController@verifyEmail');
Route::get('/email-passwordreset/{link}', 'EmailController@passwordReset');
Route::post('/sendForgotpasswordEmail', 'EmailController@sendForgotPasswordEmail');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/contact', 'PMController@pageContact');
    Route::post('/contact', 'EmailController@contactAdmin');
    Route::get('/howto', 'PMController@pageHowto');
    Route::get('/activeplays', 'PMController@pageActiveplays');
    Route::get('/profile', 'PMController@pageProfile');
    Route::get('/paid_blog', 'PMController@pagePaidBlog');
    Route::get('/pricing', 'PMController@pagePricing');
    Route::post('/pay', 'PMController@paySubscription');
    Route::get('/payment_history', 'PMController@pagePaymentHistory');
    Route::post('/setting_password', 'PMController@settingPassword');
    Route::post('/setting_email', 'PMController@settingEmail');
    Route::post('/setting_notify', 'PMController@settingNotify');
    Route::post('/request_bio', 'PMController@requestBIO');
    
    //admin
    Route::resource('/blog', 'BlogController');
    Route::resource('/content', 'ContentController');
    Route::resource('/setting', 'SettingController');
});


//Add routes before this line only
Route::get('/{any}', 'HomeController@index');

Route::get('/', 'PMController@root');
