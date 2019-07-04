<?php
class Session {
    public static function init() {
        session_start();
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function unset($key) {
        unset($_SESSION[$key]);
    }

    public static function get($key) {
        if(isset($_SESSION[$key]))
        return $_SESSION[$key];
    }

    public static function destroy() {
        // unset($_SESSION);
        session_destroy();
    }
    public static function lastPages() {
        if(!isset($_SESSION)) {
            session_start();
        } 
        if (isset($_SESSION['pages'])) {
            if (count($_SESSION['pages']) < 5) {
                    $_SESSION['pages'][] = $_SERVER['REQUEST_URI'];
                } else {
                    for ($i=1; $i<5; $i++) {
                        $_SESSION['pages'][$i-1] = $_SESSION['pages'][$i];
                    }
                    $_SESSION['pages'][4] = $_SERVER['REQUEST_URI'];
                }
        } else {
            $_SESSION['pages'] = array();
            $_SESSION['pages'][] = $_SERVER['REQUEST_URI'];
        }
        $data = $_SESSION['pages'];
        return $_SESSION['pages'];
    }
}