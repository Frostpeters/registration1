<?php

require "db.php";
require "test.php";
require "sesion.php";

$data = $_POST;
if (isset($data['do_signup'])) {

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

?>


<form action="/signup.php" method="POST">

    <p>
    <p>Введите логин</p>
    <input type="text" name="login" value="<?php
    if (isset ($data['login'])) {
        $data['login'];
    }
    echo $data['login'] ?? '';
    ?>">
    </p>

    <p>
    <p>Введите пароль</p>
    <input type="password" name="password">
    </p>

    <p>
        <button type="submit" name="do_signup">Зарегистрироватся</button>
    </p>

    <p>
        <button><a href="/index.php">Назад</a></button>
    </p>
</form>
