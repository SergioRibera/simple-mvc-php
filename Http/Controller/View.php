<?php

function view($filename, $data = []){
    $render = new BladeOne(VIEW_PATH, DIR.'/Http/Compilers', BladeOne::MODE_AUTO);
    echo $render->run($filename, $data);
}