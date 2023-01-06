<?php


//include "controler/controler.php";
include "data.php";



if (!isset($_SESSION["logovani_korisnik"])) {
    header("Location: view/login.php");
} else {
    $korisnik = $_SESSION["logovani_korisnik"];

    if ($korisnik->getTip() == "user") {
        include "shop.php";
        exit();
    } else if ($korisnik->getTip() == "admin") {
        include "view/administrator.php";
        exit();
    } else {
        echo "404";
        exit();
    }
}
