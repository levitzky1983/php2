<?php
class M_User extends Model {
    public function getData(){
    }
    public function authUser() {
        if(!isset($_SESSION)){
            Session::init();
        }
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM users WHERE `login`=:login && `pass`=:pass" ;
        $result = DB::getRow($sql,[':login'=>$login,':pass'=>$pass]);
        if($result) {
            //session::set('auth',true);
            session::set('user_id',$result['id']);
            //session::set('login',$result['login']);
            $str = 'Вы вошли как,'.$result['name'];

        } else {
           $str = 'Неправильный логин или пароль';
        }
        return $str;
    }

    public function logOut() {
        if(isset($_SESSION)){
            Session::unset('user_id');
            Session::destroy();
        }
    }

    public function registration() {
        $name = $_POST['name'];
        $login  = $_POST['login'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM users WHERE `login`=:login";
        $result = DB::getRow($sql,[':login'=>$login]);
        if(!$result) {
            $sql = "INSERT INTO users (`name`,`login`,`pass`) VALUES (:name, :login, :pass)";
            $result = DB::insert($sql,[':name'=>$name,':login'=>$login,':pass'=>$pass]);
            if($result) {
                $str = 'Вы успешно зарегистрированы.';
                header('Location:index.php');
            } else {
                $str = 'Ошибка регистрации';
            }
           
        } else {
            $str = 'Такой пользователь существует.';
        }
        return $str;
    }

    public function account() {
        $sql = "SELECT * FROM users WHERE id = :id";
        $result = DB::getrow($sql,[':id'=>session::get('user_id')]);
        return $result;
    }
}