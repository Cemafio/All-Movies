<?php
    include 'public/bdd.php';
    include 'public/function.php';

    $article = recupArticle(bdd());

    if(isset($_POST['modifi'])){
        modifier(bdd(), $article['img']);
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
    <div class="containForm8">
        <form action="" method="post">
            <input type="text" name="titre" id="" value="<?= $article['titre']; ?>">
            <input type="text" name="type" id="" value="<?= $article['Type']; ?>">
            <input name="sousTitre" id="Iarea2" cols="30" rows="3" value="<?= $article['apropo']; ?>"/>
            <input name="voirplus" id="Iarea2" cols="30" rows="5" value="<?= $article['voirplus']; ?>"/>
            <input type="file" name="sary" id="" value="<?= $article['img']; ?>">

            <input type="submit" value="Enregistrer" id="ISub" name="modifi">
        </form>
    </div>
</body>
</html>