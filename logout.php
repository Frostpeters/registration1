<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require "db.php";

unset($_SESSION['logged_user']);
header('Location: /');