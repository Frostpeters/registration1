<?php

require "db.php";
require "sesion.php";

unset($_SESSION['logged_user']);
header('Location: /');