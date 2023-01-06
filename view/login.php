<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../script/styles.css">
    <title>Shop</title>
</head>

<body>
    <div>
        <div>
            <form class="login" method="POST" action="#">
                <div class="container">
                    <label class="ime">Korisničko ime</label>
                    <br>
                    <input type="text" name="ime" id="ime" required>
                    <br>
                    <label for="sifra">Lozinka</label>
                    <br>
                    <input type="text" name="sifra" id="sifra" required>
                    <br>
                    <button type="submit" name="login" id="login">Prijavi se</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
<?php

include "../data.php";


if (isset($_SESSION["logovani_korisnik"])) {
    header("Location:../");
} else {
    if (isset($_POST["login"])) {
        if ($_POST["ime"] == "" || $_POST["sifra"] == "") {
            echo "Morate uneti ime i sifru";
        } else {
            foreach ($_SESSION["users"] as $korisnik) {
                if ($korisnik->getIme() == $_POST["ime"] && $korisnik->getSifra() == $_POST["sifra"]) {
                    $_SESSION["logovani_korisnik"] = $korisnik;
                    //echo "Ulogovani korisnik: " . $_SESSION["logovani_korisnik"]->getIme();
                    header("Location:../");
                    break;
                } else {
                    echo "Korisnik ne postoji";
                }
            }
        }
    }
}
include "../view/footer.php";
?>