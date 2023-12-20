<?php 
    session_start();
    include 'public/bdd.php';
    include 'public/function.php';

    $back1= "navlist1";
    $back2= "";  
    $back3= "";  
    $aff_videos= "";  

    $saryUser = makaSary(bdd());

    $messAdmin = messAdmin(bdd());

    if(isset($_POST["rech"])){
        $videos = filter(bdd());
    }else{
        $videos = affArticle(bdd());
    }
    
    for($i=0; $i<count($videos); $i++){
            // print_r($videos[$i]['titre']);
            $aff_videos .= "
                <div class='video'>
                    <div class='containImg'>
                        <img src='img/".$videos[$i]['img']."' srcset=''>
                    </div>
                    <div class='containDesc'>
                        <p class='containDateName'>
                            <span class='date'>".$videos[$i]['date']."</span>
                        </p>
                        <p class='nameVideo'>".$videos[$i]['titre']."</p>
                        <p class='textDencretage'>".$videos[$i]['apropo']."</p>
                        <div class='containBtn2'>
                        <a href='voirPlus.php?id=".$videos[$i]['id']."'><button class='btn2'>Voir plus</button></a>
                        </div>
                    </div>
                </div>";
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
    <script src="../js/fonctionaliter.js" defer></script>
    <title>MANGA | Acceuil</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="containPrincipale">
        <div class="containIform">
            <form action="" method="POST">
                <input type="text" name="achercher" id="Irech" placeholder="Faire une Recherche">
                <button type="submit" name="rech" class="btnSubm">OK</button>
            </form>
        </div>

        <div class="containeSlide">
            <div class="btnTopBottom">
                <div class="btnTop">
                    <i class="fas fa-arrow-up"></i>
                </div>
                <div class="btnBottom">
                    <i class="fas fa-arrow-down"></i>

                </div>
            </div>
            <div class="containImgSlide">
                <img src="img/dbz.jpg" alt="" srcset="">
                <img src="img/kaizen.jpg" alt="" srcset="">
                <img src="img/ragna2.jpg" alt="" srcset="">
                <img src="img/DemonS.jpg" alt="" srcset="">
            </div>
        </div>

        <div class="containParag">
            <h2 class="titrePrincipale">Liste de video disponible </h2>
        </div>

        <div class="filter">
            <div class="choix n1">All</div>
            <div class="choix">Films</div>
            <div class="choix">Dessin Animé</div>
            <div class="choix">Serie</div>
            <div class="choix">Manga</div>
        </div>
        <div class="containAllVideo">
            <div class="cadreVideo">
                <?= $aff_videos; ?>
            </div>
        </div>
       
    </section>
    
</body>
</html>