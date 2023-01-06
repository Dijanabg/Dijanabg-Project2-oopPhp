<?php

include "utility/Obrada.php";
include "model/ApstractUser.php";
include "model/Admin.php";
include "model/User.php";

session_start();
$admin = new Admin('admin', 'admin', 'admin@gmail.com', 'admin', '064222333', 'admin');

$user1 = new User('Ana', 'Anic', 'ana@gmail.com', 'ana', ' 064111222', 'user');

$nizkorisnika = [$admin, $user1];
$_SESSION["users"] = $nizkorisnika;
