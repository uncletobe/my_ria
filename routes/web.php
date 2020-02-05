<?php

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


Route::get('/', 'News\HomeController@index')->name('home');

Route::get('news/{articleSlug}', 'News\ArticleController@index')
    ->name('article');

Route::get('author-article/{articleSlug}', 'News\AuthorArticleController@index')
    ->name('authorArticle');

Route::get('user/id/{id}', 'User\UserController@show')->name('showUser');

Route::post('user/login', 'Auth\LoginController')->name('login');

Route::post('user/register', 'Auth\RegisterController')->name('register');

Route::post('user/restore-password', 'Auth\RestorePasswordController')->name('restorePassword');

Route::get('confirm/token/{token}', 'Auth\ConfirmController')->name('confirm');

Route::get('renew-password/token/{token}', 'Auth\RenewPasswordController@index');

Route::post('user/renew-password', 'Auth\RenewPasswordController@renewPassword')->name('renewPassword');

Route::get('user/logout', 'Auth\LogoutController')->name('logout');


//Route::get('/test-mail', function (){
//    Notification::route('mail', 'KashaGerkyles@yandex.ru')->notify(new \App\Notifications\ConfirmEmail());
//    return 'Sent';
//});


/* --> Redis */

Route::post('addassessment', 'News\NewsLikeController')
    ->middleware('auth-user')
    ->name('addAssessment');

