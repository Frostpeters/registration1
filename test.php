<?php

require_once "db.php";


class test
{
    public $check;

    public function chekLogin($name)
    {
        $sql = "SELECT login FROM users WHERE login=?";
        $query = db::connect()->prepare($sql);
        $query->execute([$name['login']]);
        //return $query->fetchAll();

        $check = $query->rowCount();
        return $check;
    }

    public function login($name)
    {
        $sql = "SELECT login, password FROM users WHERE login=? AND password=?";
        $query = db::connect()->prepare($sql);
        $query->execute([$name['login'], md5($name['password'])]);
        return $query->rowCount();

    }
}


