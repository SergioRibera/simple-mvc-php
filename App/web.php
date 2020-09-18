<?php

    Route::get('/', function () {
        view('home', ['name' => APP_NAME]);
    });

    Route::get('/api/(.*)', function ($var1){
        view('api', ['token' => $var1]);
    });