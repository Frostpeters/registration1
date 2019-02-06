<?php


require "sesion.php";
require_once "db.php";
require "test.php"

?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    HI
    <?php echo $_SESSION['logged_user'] ?><br>
    <a href="logout.php">Logout</a>
<?php else : ?>
    <form action="/index.php" method="POST">

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
            <button type="submit" name="do_signup">Зарегистрироватся</button>
        </p>

    </form>

    <?php
    $data = $_POST;
    if (isset($data['do_login'])) {
        $login = new test();

        $login->flogin($data);

    }

    if (isset($data['do_signup'])) {
        $sigin = new test();

        $sigin->fsignup($data);

    }
    ?>

<?php endif; ?>