<?php
    session_start();
    include 'public/bdd.php';
    include 'public/function.php';
    bdd();
    
    $messAdmin = messAdmin(bdd());

    if(isset($_POST["Ienv2"])){
        $err = inscription(bdd());
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
    <title>MANGA | Inscription</title>
</head>
<body>
    <section class="containPrincipaleI">
        <form action="" method="POST" class="form3">
            <div class="titreForm2">
                <h3 class="titre2">Inscription sur GNE<span class="color">BRO</span> </h3>
            </div>
            <div class="error">
                <p><?php if(isset($_POST["Ienv2"])){ echo ''. $err;}?></p>
            </div>
            <div class="containInpt2">
                <div class="containLabInpt">
                    <input type="text" name="pseudo" id="InscName" placeholder="Votre pseudo*" value="<?php if(isset($_POST["Ienv2"])){ echo ''. $_POST["pseudo"];}?>">
                </div>
                <div class="containLabInpt">
                    <input type="email" name="email" id="InscEmail" placeholder="Votre adress email*" value="<?php if(isset($_POST["Ienv2"])){ echo ''. $_POST["email"]; }?>">
                </div>
                <div class="containLabInpt">
                    <input type="email" name="V_email" id="InscEmail" placeholder="Verrification de votre adress email*" value="<?php if(isset($_POST["Ienv2"])){ echo ''. $_POST["V_email"]; }?>">
                </div>
                <div class="containLabInpt">
                    <input type="password" name="pass" id="InscEmail" placeholder="Votre mot de pass*" value="<?php if(isset($_POST["Ienv2"])){ echo ''. $_POST["pass"]; }?>">
                </div>
                <div class="containLabInpt">
                    <input type="password" name="v_pass" id="InscEmail" placeholder="Confirmation de mot de pass*" value="<?php if(isset($_POST["Ienv2"])){ echo ''. $_POST["v_pass"]; }?>">
                </div>
                <div class="containLabInptFiles">
                    <input type="file" name="photo" id="Iphoto" placeholder="Votre adress email*">
                </div>
            </div>

            <div class="containBtnAvis2">
                <input type="submit" value="S'inscrire" class="Ienv2" name="Ienv2">
                <input type="reset" value="Initialiser" class="Ienv2">
            </div>

        </form>
    </section>
</body>
</html>