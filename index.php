<?php
    session_start();
    include 'public/bdd.php';
    include 'public/function.php';
    $error="";

    if(isset($_POST["connect"])){
        $error = connection(bdd());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sass/style.css">
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.min.css">
    <title>MANGA | Log in</title>
</head>
<body>
    <section class="sectLog">
        <form action="" method="POST">
            <h3>Connection sur GNE<span class="color2">BRO</span></h3>
            <p style="color:red;font-size: 13px;"><?=$error ?></p>
            <input type="text" name="pseudo" id="Ipseudo" placeholder="Votre pseudo">
            <input type="password" name="pass" id="Ipass" placeholder="Votre password">

            <p class="pInscript"><a href="inscription.php" class="linkInsc">Crée un compte</a></p>

            <div class="ctnBtn">
                <button type="submit" class="btnSub2" name="connect">Connecté</button>
            </div>
        </form>
    </section>
</body>
</html>