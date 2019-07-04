<?php
class M_User extends Model {
    public function getData(){
    }
    public function authUser() {
        if(!isset($_SESSION)){
            Session::init();
        }
        $login = trim(strip_tags($_POST['login']));
        $pass = trim(strip_tags($_POST['pass']));
        $db = DB::getInstance();
        $sql = $db->prepare("SELECT * FROM users WHERE `login`=:login && `pass`=:pass" );
        $sql->bindParam(':login',$login);
        $sql->bindParam(':pass',$pass);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($result) {
            session::set('auth',true);
            session::set('name',$result[0]['name']);
            session::set('login',$result[0]['login']);

        } else {
            header("Location:index.php");
        }
    }

    public function logOut() {
        if(isset($_SESSION)){
            Session::unset('auth');
            Session::unset('name');
            Session::destroy();
        }
    }
}