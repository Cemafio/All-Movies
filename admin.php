<?php
    include 'public/bdd.php';
    include 'public/function.php';

    $back1 = "navList1_2";
    $back2 = "";

    $membre = recupMembre(bdd());
    // print_r($membre);
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
                <p><i class="fas fa-list"></i></p>
                <a href="contenue.php" class="navLink2">Contenue</a>
            </li>
        </ul>
    </div>
    <section class="containMembre">
        <div class="lister">
        <?php foreach($membre as $aff): ?>

            <div class="containMembre2">
                <div class="membre">
                    <div class="profil2">
                        <div class="profilImg">
                            <img src="img/<?= $aff['sary']; ?>" alt="" srcset="">
                        </div>
                        <p class="nameUser4"><?= $aff['pseudo']; ?></p>
                    </div>
                    <div class="Contacter">
                        <a href="messAdmin.php?id=<?= $aff['id']; ?>"><i class="fas fa-comment-alt"></i></a>
                    </div>
                </div>
                
            </div>

        <?php endforeach; ?>
        </div>
    </section>
</body>
</html>