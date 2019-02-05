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
        return $query->fetchAll();

//        $check = $query->rowCount();
//        echo "$check";
//        return $check;
    }
}