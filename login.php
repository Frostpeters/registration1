<?php
require "db.php";
require "test.php";
require "sesion.php";
print_r($_SESSION);


$data = $_POST;
if (isset($data['do_login'])) {
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
}

?>


<form action="/login.php" method="POST">

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
        <button type="submit" name="do_login">Залогинится</button>
    </p>

    <p>
        <button><a href="/index.php">Назад</a></button>
    </p>
</form>
