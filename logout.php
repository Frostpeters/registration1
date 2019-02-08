<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . './db.php';

unset($_SESSION['logged_user']);
unset($_SESSION['cart']);
header('Location: /');