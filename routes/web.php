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
Route::get('blog', 'SiteController@blog');
Route::get('contact-us', 'SiteController@contactForm');
Route::post('contact-us', 'SiteController@contact');
