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

Route::get('user/id/{id}', 'User\UserController@show')->name('showuser');

Route::post('user/login', 'Auth\LoginController')->name('login');

Route::post('user/register', 'Auth\RegisterController')->name('register');

Route::get('confirm/token/{token}', 'Auth\ConfirmController')->name('confirm');

Route::get('user/logout', 'Auth\LogoutController')->name('logout');

//Route::get('/test-mail', function (){
//    Notification::route('mail', 'KashaGerkyles@yandex.ru')->notify(new \App\Notifications\ConfirmEmail());
//    return 'Sent';
//});

Route::match(['get'], 'user/register', function(){
    return abort(404);
});

/* --> Redis */

Route::post('news/{articleSlug}/addassessment', 'News\NewsLikeController@addAssessment')
    ->middleware('auth-user')
    ->name('addAssessment');
