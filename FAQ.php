<?php 
    session_start();
    include 'public/bdd.php';
    include 'public/function.php';

    $back1= "";
    $back2= "";  
    $back3= "navlist1";
    $coms="";

    $messAdmin = messAdmin(bdd());

    $saryUser = makaSary(bdd());
    $listcoms = affComs(bdd());

    if(isset($_POST["send"])){
        creationComs(bdd());   
    }
    // print_r($Listcoms);
    for($i=1; $i<count($listcoms); $i++){
            $coms .= "
                <div class='comms'>
                    <div class='tria'></div>
                    <div class='containImgT'>
                        <div class='miniProfil'>
                            <img src='img/".$listcoms[$i]['sary']."' alt='' srcset=''>
                        </div>
                        <p>".$listcoms[$i]['coms']."</p>
                    </div>
                </div>
            ";
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
    <title>MANGA | FAQ</title>
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

        <div class="discus">
            <div class="containTitre">
                <h4>Liste Commentaire</h4>
            </div>
            <div class="containComment">
                <?= $coms?>
            </div>
            <div class="containformSend">
                <form action="" method="post">
                    <input type="text" name="comms" id="Icoms" placeholder="Votre commentaires">
                    <input type="submit" name="send" id="Isend" value="Envoy">
                </form>
                
            </div>
        </div>

    </section>
</body>
</html>