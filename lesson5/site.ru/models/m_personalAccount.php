<?php
class M_PersonalAccount extends Model {
    public function getData(){
        if(!isset($_SESSION)) {
            Session::init();
        }
        $name = Session::get('name');
        $login = Session::get('login');
        $data=array('name'=>$name,'login'=>$login);
        return $data;
    }
}