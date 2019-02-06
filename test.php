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

    public function flogin($data)
    {
        $errors = array();
        if (trim($data['login']) == '') {
            $errors[] = 'Enter login';
        }

        if ($data['password'] == '') {
            $errors[] = 'Enter password';
        }
        if (empty($errors)) {
            $test = new test();
            $query = $test->login($data);
            if ($query == 1) {
                $user = $data['login'];
                $_SESSION['logged_user'] = $user;
                echo "Hi $user";
                echo '<div style="color: green;">Go to main <a href="/">page</a></div><hr>';
            } else {
                echo 'User not found';
            }

        } else {
            echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
        }
        return $user;
    }

    public function fsignup($data)
    {

        $errors = array();
        if (trim($data['login']) == '') {
            $errors[] = 'Enter login';
        }

        if ($data['password'] == '') {
            $errors[] = 'Enter password';
        } else {
            $test = new test();

            $check = $test->chekLogin($data);

//        print_r($check);
//       die;

            if ($check > 0) {

                $errors[] = 'Dublicate user';
            }
        }

        if (empty($errors)) {
            db::connect()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $result = db::connect()->prepare(
                "INSERT INTO users(`login`, `password`)
                VALUES(?,?)");
            $result->execute([$data['login'], md5($data['password'])]);
            echo '<div style="color: green;">Зарегистрирован</div><hr>';


        } else {
            echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
        }
    }
}


