<?php
if (!isset($_SESSION['logovani_korisnik'])) {
    session_start();
}

include_once "model/Cart.php";

if (!isset($_SESSION['cart'])) {
    include_once "view/catalog.php";
}
if (isset($_GET['storeProductId'])) {
    $productId = $_GET['storeProductId'];
    $cart = new Cart($productId);
    $cart->storeItems();
    include_once "view/catalog.php";
    exit();
}
if (isset($_GET['removeItem'])) {
    $productId = $_GET['removeItem'];
    $cart = new Cart($productId);
    $cart->removeItem();
    include_once "view/catalog.php";
    exit();
}
if (isset($_GET['updateQuantity'])) {
    $productId = $_GET['productId'];
    $kolicina = $_GET['kolicina'];
    if (is_numeric($kolicina) && $kolicina > 0) {
        $cart = new Cart($productId);
        $cart->updateQuantity($kolicina);
    }
    include_once "view/catalog.php";
    exit();
}

if (isset($_GET['clearCart'])) {
    Cart::clearCart();
    include_once "view/catalog.php";
    exit();
}
