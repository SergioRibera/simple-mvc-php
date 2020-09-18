<?php

    class Home extends Controller{

        public function __construct()
        {
            parent::__construct([]);
        }

        // This is a custom function, called in web on Route::get('/home')
        public function viewHome(){

            parent::render('home');
        }
    }