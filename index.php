<?php


# Global Vars
define("DIR", __DIR__);
define("TEMPLATE_PATH", __DIR__.'/App/Base/Templates/');
define("COMPONENT_PATH", DIR.'/App/Base/Components/');
define("VIEW_PATH", DIR.'/App/View/');
define("EXTENSION_VIEW", ".blade.php");

# Config Files
include __DIR__.'/Http/Config/Config.php';
include __DIR__.'/Http/DataBase/DB.php';


define("APP_NAME", Config::get("APP_NAME"));


# Route System Files
include __DIR__.'/Http/Route/Route.php';

# MVC Files
include __DIR__.'/Http/Controller/View.php';
include __DIR__.'/Http/Controller/lib/BladeOne.php';
include __DIR__.'/Http/Controller/Controller.php';

foreach (glob(__DIR__.'/App/Controller/*.php') as $filename)
{
    include $filename;
}

# Routed Listed
include __DIR__.'/App/web.php';
Route::run('/');