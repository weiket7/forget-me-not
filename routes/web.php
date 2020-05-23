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

Route::get('/', 'SiteController@home');
Route::get('about-us', 'SiteController@about');
Route::get('dogs-for-adoption', 'SiteController@dogsForAdoption');
Route::get('view/{slug}', 'SiteController@view');
Route::get('sponsor-a-dog', 'SiteController@sponsor');
Route::get('donate', 'SiteController@donate');
Route::get('merchandise', 'SiteController@merchandise');
Route::get('events', 'SiteController@events');
Route::get('volunteer', 'SiteController@volunteer');
Route::get('blog', 'SiteController@blog');
Route::get('contact-us', 'SiteController@contactForm');
Route::post('contact-us', 'SiteController@contact');

Route::get('admin', 'AdminController@index');
Route::get('api/adopt', 'AdoptController@index');
Route::get('api/adopt/get/{adoptId}', 'AdoptController@get');
Route::post('api/adopt/save', 'AdoptController@save');
Route::post('api/adopt/save/{adoptId}', 'AdoptController@save');
Route::post('api/adopt/delete/{adoptId}', 'AdoptController@delete');

Route::get('api/content/get/{page}', 'ContentController@get');
