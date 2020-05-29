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
Route::get('blog/{slug}', 'SiteController@blogPost');
Route::get('contact-us', 'SiteController@contactForm');
Route::post('contact-us', 'SiteController@contact');

Route::get('admin', 'AdminController@index');
Route::get('login', 'AdminController@login');
Route::post('login', 'AdminController@login');
Route::post('api/delete-record', 'AdminController@deleteRecord');

Route::post('api/upload-image', 'AdminController@uploadImage');
Route::get('api/adopt', 'AdoptController@index');
Route::get('api/adopt/get/{adoptId}', 'AdoptController@get');
Route::post('api/adopt/save', 'AdoptController@save');
Route::post('api/adopt/save/{adoptId}', 'AdoptController@save');

Route::get('api/blog', 'BlogController@all');
Route::get('api/blog/get', 'BlogController@get');
Route::get('api/blog/get/{id}', 'BlogController@get');
Route::post('api/blog/save/', 'BlogController@save');
Route::post('api/blog/save/{id}', 'BlogController@save');

Route::get('api/content/get/{page}', 'ContentController@get');
Route::post('api/content/save/{page}', 'ContentController@save');
