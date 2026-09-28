<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('website.home');
Route::view('/about-us', 'pages.about')->name('website.about');
Route::view('/farmers-membership', 'pages.membership')->name('website.membership');
Route::view('/what-we-do', 'pages.services')->name('website.services');
Route::view('/markets-partners', 'pages.markets')->name('website.markets');
Route::view('/resources', 'pages.resources')->name('website.resources');
Route::view('/contact-us', 'pages.contact')->name('website.contact');
