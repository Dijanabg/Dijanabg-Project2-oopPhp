<?php

class Cart
{
    protected $product = [];

    public function __construct($productId)
    {
        $data = json_decode(file_get_contents("products.json"), true);
        foreach ($data as $key => $value) {
            if ($value['id'] == $productId) {
                $this->product = $data[$key];
            }
        }
        //echo var_export($this->product, true);  //provera da li ispisuje sve vrednosti proizvoda
    }

    public function storeItems()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][] = $this->product;
        } else {
            $ids = [];
            foreach ($_SESSION['cart'] as  $key => $value) {
                array_push($ids, $value['id']);
            }
            if (!in_array($this->product['id'], $ids)) {
                $_SESSION['cart'][] = $this->product;
            }
        }
    }
    public function removeItem()
    {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['id'] == $this->product['id']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
    public function updateQuantity($kolicina)
    {
        foreach ($_SESSION['cart'] as  $key => $value) {
            if ($value['id'] == $this->product['id']) {
                $_SESSION['cart'][$key]['quantity'] = $kolicina;
            }
        }
    }
    public static function getSubTotal($productId)
    {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $productId) {
                $sub_sum = $value['price'] * $value['quantity'];
                return number_format($sub_sum, 2);
            }
        }
    }

    public static function getPriceTotal()
    {
        $sum = [];
        foreach ($_SESSION['cart'] as $value) {
            $sub_sum = $value['price'] * $value['quantity'];
            array_push($sum, $sub_sum);
        }
        return number_format(array_sum($sum), 2);
    }
    public static function clearCart()
    {
        unset($_SESSION['cart']);
    }
}
