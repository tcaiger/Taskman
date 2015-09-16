<?php

Route::get('/', VIEWS.'landing.php');

Route::get('/register', CONTROLLERS.'register.php');
Route::post('/register', CONTROLLERS.'register.php');
Route::get('/signin', CONTROLLERS.'signin.php');
Route::post('/signin', CONTROLLERS.'signin.php');
Route::get('/signout', CONTROLLERS.'signout.php');

Route::get('/home', VIEWS.'home.php');


Route::fallback(VIEWS.'404.php');
