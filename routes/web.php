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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'News\HomeController@index')->name('home');

Route::get('news/{articleSlug}', 'News\ArticleController@index')
    ->name('article');

Route::get('author-article/{articleSlug}', 'News\AuthorArticleController@index')
    ->name('authorArticle');

Route::get('user/id/{id}', 'User\UserController@show')->name('showuser');

Route::post('user/register', 'Auth\RegisterController');

Route::get('/test-mail', function (){
    Notification::route('mail', 'KashaGerkyles3@yandex.ru')->notify(new \App\Notifications\ConfirmEmail());
    return 'Sent';
});