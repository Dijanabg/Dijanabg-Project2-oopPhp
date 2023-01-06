<?php
include_once "headerAdmin.php";
//include_once "products.json";

//session_start();
?>
<!-- Title and sub-title -->
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

    <!-- The product element -->
    <table>
        <tr>
            <th>Slika</th>
            <th>Naziv</th>
            <th>Cena</th>
        </tr>
        <?php
        $products = json_decode(file_get_contents("products.json")); ?>

        <?php foreach ($products as $product) { ?>
            <tr>
                <td><img src="<?php echo $product->image ?>" alt=""></td>
                <td><?php echo $product->name ?></td>
                <td><?php echo number_format($product->price, 2) ?></td>
                <td>
                    <a href="#">Izmeni</a>
                </td>
                <td>
                    <a href="#">Obriši</a>
                </td>

            </tr>
        <?php } ?>
    </table>
</div> <!-- End of products -->



</div> <!-- End of page -->
<?php require "footer.php"; ?>