<?php 
    session_start();
    include 'public/bdd.php';
    include 'public/function.php'; 

    $id = $_GET['id'];
    $apropo = voirPlus(bdd());
    $listComs = affComsArticle(bdd());

    if(isset($_POST["env3"])){
        if(!empty($_POST["Icoms2"])){
            addCommentaires(bdd());
            header("Location: voirPlus.php?id=".$id);
        }else{
            echo "C'est vide :(";
        }
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
    <script src="../js/fonctionaliter2.js" defer></script>
    <title>GNEBRO | Voir Plus</title>
</head>
<body>
    <div class="formHead">
        <div class="containBack">
            <i class="fas fa-arrow-left"></i>
        </div>
        <div class="containLogo2">
            <p>GNEBRO</p>
        </div>
    </div>

    <section class="sect3">
        <div class="cadre1">
            <div class="containVideoText">
                <div class="video">
                    <img src='img/<?= $apropo['img']?>' alt="" srcset="">
                </div>
                <div class="texte">
                    <h2><?= $apropo['titre']?></h2>
                    <p><?= $apropo['voirplus']?></p>
                </div>
                <div class="champT">
                    <form action="" method="post">
                        <textarea name="Icoms2" id="Icoms2" cols="95" rows="3" placeholder="Votre avis sur cette manga" style="padding: 5px;"></textarea>
                        <input type="submit" value="Envoyer" name="env3" id="Ibtn">
                    </form>
            </div>
            </div>
            
        </div>
        <div class="cadre2">
            <div class="containTitre">
                <h4>Commentaires sur Jujutsu Kaizen</h4>
            </div>
            <div class="listComment">

            <?php foreach($listComs as $tmp){ ?>
                <div class="coms2">
                    <div class="containPN">
                        <div class="profil3">
                            <img src="img/<?= $tmp['sary'];?>" alt="" srcset="">
                        </div>
                        <p><?= $tmp['nom'];?></p>
                    </div>

                    <p class="textComs2"><?= $tmp['comsVideo'];?></p>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>