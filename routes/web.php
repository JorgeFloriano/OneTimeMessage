<?php

use Illuminate\Support\Facades\Route;

// Present the message creation form
Route::get('/', 'Main@index')->name('main_index');
Route::post('/init', 'Main@init')->name('main_init');

// Confirmation of message sending
Route::get('/confirm/{purl}', 'Main@confirm')->name('main_confirm');

// Reading the message
Route::get('/read{purl}', 'Main@read')->name('main_read');


