<?php
spl_autoload_register(function ($className) {
    $dirs = ['core','controllers','models'];
    $found = false;
    foreach ($dirs as $dir) {
        $fileName = $dir . '/'.$className.'.php';
        if (is_file($fileName)) {
            require_once($fileName);
            $found = true;
        }
    }
    if (!$found) {
        throw new Exception('Unable to load ' . $className);
    }  
});
if(!isset($_SESSION)) {
    Session::init();
}
try  {
    Route::start();
}  
catch (PDOException $e){
    echo "DB is not available";
}

