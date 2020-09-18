<?php

    class Controller{
        public $vars = [];

        function __construct($data = [])
        {
            $this->set($data);
        }

        public function set($data){
            $this->vars = array_merge($this->vars, $data);
        }

        public function render($view){
            $render = new BladeOne(VIEW_PATH, DIR.'/Http/Compilers', BladeOne::MODE_AUTO);
            echo $render->run($view, $this->vars);
        }
    }