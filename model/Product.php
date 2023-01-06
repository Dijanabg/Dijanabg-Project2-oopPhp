<?php



include_once "category.php";

class Product
{
    public $id;
    public $image;
    public $name;
    public $price;
    public $quantity;
    public Category $catname;

    public function __construct($id, $image, $name, $price, $quantity,  $catname)
    {
        $catname = new Category($catname);
        $this->id = $id;
        $this->image = $image;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function addToCart(Cart $cart, int $quantity)
    {
        return $cart->storeItems($this, $quantity);
    }

    public function removeFromCart(Cart $cart)
    {
        return $cart->removeItem($this);
    }
}
