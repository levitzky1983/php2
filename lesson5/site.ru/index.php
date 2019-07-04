<?php
spl_autoload_register(function ($className) {
    include "core/$className.php";
});
if(!isset($_SESSION)) {
    Session::init();
}    
Route::start();