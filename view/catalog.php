<?php
include_once "header.php";

//$_SESSION['cart'] = 'radi';


if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
    $css = "cart active";
} else {
    $css = "cart";
}
?>
<!-- prikaz proizvoda -->
<!-- sesija cart je prazna i proveravam da li je pokrenuta -->
<!-- provera da li sesija radi i ukoliko radi menjam klasu na active-->
<div class="<?php echo $css; ?>">
    <!-- hidden preko css klase cart -->
    <?php //echo var_export($_SESSION['cart'], true)   //provera da li radi session
    ?>
    <table>
        <tr>
            <th>Proizvod</th>
            <th>Naziv</th>
            <th>Količina</th>
            <th>Cena po proizvodu</th>
            <th>Ukupno</th>
            <th>Ukloni</th>
        </tr>

        <tr>
            <!-- Cart items -->
            <td class="cart-items" colspan="6">Proizvodi u korpi</td>
        </tr>
        <?php
        foreach ($_SESSION['cart'] as $product) {
        ?>
            <tr>
                <!-- The product html template -->
                <td><img src="<?php echo $product['image'] ?>" alt=""></td>
                <td><?php echo $product['name'] ?></td>
                <td>
                    <form action="shop.php" method="get" autocomplete="off">
                        <span>Količina</span>
                        <input type="text" name="kolicina" value="<?php echo $product['quantity']; ?>">
                        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                        <input type="submit" name="updateQuantity" value="Potvrdi količinu">
                    </form>
                </td>
                <td><?php echo number_format($product['price']) ?> DIN</td>
                <td><?php echo Cart::getSubTotal($product['id']) ?></td>
                <td><a href="shop.php?removeItem=<?php echo $product['id'] ?>">Ukloni</a></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <!-- The total suma -->
            <td class="total-price" colspan="6"><?php echo Cart::getPriceTotal($productId) ?>Ukupna cena</td>
        </tr>

        <tr>
            <!-- The clear cart button -->
            <td class="clear-cart" colspan="6"> <a href="shop.php?clearCart">Isprazni korpu</a> </td>
        </tr>
    </table>
</div>

<!-- Title and sub-title and logout-->
<h1>Najbolja kupovina zauvek</h1>
<h3 class="text">
    Sačuvajte okolinu, ostanite zdravi, uštedite novac
</h3>

<div id="logout">
    <form action="view/logout.php" method="post">
        <input type="submit" value="logout" name="logout" id="logout">
    </form>
</div>

<!-- The products wrapper -->
<div class="products">
    <?php
    $data = json_decode(file_get_contents("products.json"));
    foreach ($data as $product) { ?>
        <!-- The product element -->
        <div class="product">
            <!-- The products image -->
            <img src="<?php echo $product->image ?>" alt="">
            <!-- The products name -->
            <p class="name"><?php echo $product->name ?></p>
            <!-- The products price formatted with two decimals  -->
            <p class="price"><?php echo number_format($product->price, 2) ?>DIN</p>
            <!-- The add cart button -->
            <a href="shop.php?storeProductId=<?php echo $product->id;
                                                ?>">Ubaci u korpu</a>
        </div> <!-- End of product element -->
    <?php
    }
    ?>
</div> <!-- End of products -->



</div> <!-- End of page -->
<?php require "footer.php"; ?>