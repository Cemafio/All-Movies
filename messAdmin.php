<?php
    include 'public/bdd.php';
    include 'public/function.php';

    $erreur = "";

    $membre = recupMembre(bdd());
    if(isset($_POST["messAdmin"])){
        // echo 'Soumition detecter';
        $erreur = creatMessAdmin(bdd(), $membre);
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
    <script src="../js/admin.js" defer></script>
    <title>GNEBRO | Admin</title>
</head>
<body>
    <div class="formHead">
        <div class="containBack">
            <a href="admin.php"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="containLogo2">
            <p>ADMIN</p>
        </div>
    </div>
    <?php 
        foreach($membre as $aff): 
            if($aff["id"] === $_GET["id"]):
    ?>

    <div class="containEnvMes">
        <h5>Message à envoyer a <?= $aff["pseudo"]; ?></h5>
        <form action="" method="post">
            <p style="color: red; font-size: 13px;"><?= $erreur;?></p>
            <textarea name="textArea" id="ImessAdmin" cols="120" rows="4" placeholder="Entrer une mess pour <?= $aff["pseudo"]; ?>" ></textarea>
            <input type="submit" value="Envoyer" id="IenvAdm" name="messAdmin">
        </form>
    </div>
    <?php 
            endif;
        endforeach; 
    ?>

</body>