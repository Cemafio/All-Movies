<?php 
    session_start();
    include 'public/bdd.php';
    include 'public/function.php';

    $back1= "";
    $back2= "navlist1";  
    $back3= "";
    $erreur="";

    $saryUser = makaSary(bdd());
    $messAdmin = messAdmin(bdd());

    if(isset($_POST["envM"])){
        // echo ''.$_POST["name"].' '.$_POST["email"]. ' '. $_POST["textarea"];
        $erreur = contacter();
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
    <title>MANGA | Contact</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="containPrincipale">
        <div class="containIform">
            <form action="" method="POST" class="form2">
                <input type="text" name="recherche" id="Irech" placeholder="Faire une Recherche">
                <button type="submit" name="envoy" class="btnSubm">OK</button>
            </form>
        </div>

        <form action="" method="POST" class="form1">
            <div class="titreForm">
                <h2 class="titre1">Me contacter</h2>
            </div>
            <p style="color:red;font-size:13px;display:flex;align-items;center;justify-content: center;"><?=$erreur ?></p>
            <div class="containInpt">
                <input type="text" name="name" id="Iname" placeholder="Votre nom*">
                <input type="email" name="email" id="Iemail" placeholder="Votre adress email*">
            </div>
            <div class="containTextarea">
                <textarea name="textarea" id="Iarea" cols="105" rows="12" placeholder="Votre avis*"></textarea>
            </div>
            <div class="containBtnAvis">
                <input type="submit" value="Envoyer" class="Ienv" name="envM">
            </div>
        </form>
    </section>
</body>
</html>