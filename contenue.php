<?php
    include 'public/bdd.php';
    include 'public/function.php';

    $back1 = "";
    $back2 = "navList1_2";
    $erreur = "";

    $article = affArticle(bdd());

    if(isset($_POST['creation'])){
       $erreur= creation(bdd());
    }
    if(isset($_GET["del"])){
        del(bdd());
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
    <div class="containForm7">
        <button class="btnClose">X</button>
        <form action="" method="post">
            <input type="text" name="titre" id="" placeholder="Sont titre">
            <input type="text" name="type" id="" placeholder="Quels type de video?">
            <textarea name="sousTitre" id="Iarea2" cols="30" rows="3" placeholder="Le moitier de description à afficer"></textarea>
            <textarea name="voirplus" id="Iarea2" cols="30" rows="5" placeholder="Le vrais description complet"></textarea>
            <input type="file" name="sary" id="">

            <input type="submit" value="Crée" id="ISub" name="creation">
        </form>
    </div>
    <div class="formHead">
        <div class="containBack">
        <a href="Acceuil.php"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="containLogo2">
            <p>ADMIN</p>
        </div>
    </div>
    <div class="menuAdmins">
        <ul class="navUl2">
            <li class="navList2 <?= $back1; ?>">
                <p><i class="fas fa-person-booth"></i></p>
                <a href="admin.php" class="navLink2">Membres</a>
            </li>
            <li class="navList2 <?= $back2; ?>">
                <p><i class="fas fa-list "></i></p>
                <a href="admin.php" class="navLink2">Gestion contenue</a>
            </li>
            <?= $erreur; ?>
        </ul>
    </div>
    <section class="containMembre">
        <div class="lister2">

            <?php foreach($article as $aff): ?>
            <div class="cadreContenue">
                <div class="saryVideo">
                    <img src="img/<?= $aff['img'];?>" alt="" srcset="">
                </div>
                <div class="infoAll">
                    <p class="titre2"><?= $aff['titre'];?></p>
                    <p class="date2"><?= $aff['date'];?></p>
                    <p class="lorem"><?= $aff['voirplus'];?></p>
                    <div class="containBtnModif">
                        <a href="contenue.php?del=<?= $aff['id'];?>"><button class="modif red">X</button></a>
                        <a href="modif.php?id=<?= $aff['id'];?>"><button class="modif"><i class="fas fa-pen-nib"></i></button></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        <div class="containBtnInsert">
            <button class="insert">Ajouter</button>
        </div>
    </section>
</body>
</html>