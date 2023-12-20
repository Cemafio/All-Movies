<?php
    function connection($bdd){
        $nom = htmlspecialchars($_POST["pseudo"]);
        $motDePass = $_POST["pass"];
        $erreur = "";
        

        if(!empty($nom) || !empty($pass)){

            if($nom === "admin"){

                $base3 = $bdd->prepare("SELECT * FROM admins WHERE name =?");
            
                $base3->execute(array($nom));
                $existes = $base3->rowCount();
                $bs2= $base3->fetch();

                if($existes != 0){
                    // print_r($bs['pass']);
                    if($nom === $bs2['name'] && $motDePass === $bs2['pass']){
                        $_SESSION["user"] = $nom;
                        // $_SESSION["admin"] = $nom;

                        header("Location: Acceuil.php");

                    }
                    
                }
                

            }else{

                $base2= $bdd->prepare("SELECT * FROM membres WHERE pseudo =?");

                $base2->execute(array($nom));
                $existes = $base2->rowCount();
                $bs= $base2->fetch();

                if($existes != 0){
                    // print_r($bs['pass']);
                    if($nom === $bs['pseudo'] && $motDePass === $bs['pass']){

                        echo "User veux conneccter";
                        $_SESSION["user"] = $nom;

                        header("Location: Acceuil.php");
                        // echo 'Ca ressemble';
                    }else{
                        return $erreur="Veuillier verrifier se que vous avez entrez    :)";
                    }
    
                    
                }
                
            }
            

            // for($i=0; $i<=count($bs) ;$i++){
            
            // }
        }else{
            return $erreur = "Il y a un champ vide :(";
        }
        // print_r($bs);

        
    }

    function inscription($bdd){
        $pseudo = $_POST["pseudo"];
        $email = $_POST["email"];
        $v_email = $_POST["V_email"];
        $pass = $_POST["pass"];
        $v_pass = $_POST["v_pass"];
        $profil = $_POST["photo"];
        $erreur="";

        if(!empty($pseudo) && !empty($email) && !empty($v_email) && !empty($pass) && !empty($v_pass) && !empty($profil)){
            if($email === $v_email){
                if($pass === $v_pass){

                    $pseudoexist = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo=?');
                    $pseudoexist->execute(array($pseudo));
                    $existpseudo = $pseudoexist->rowCount();
                    // verrif($bdd, $pseudo, $pass);
                    if($existpseudo == 0){
                        $base = $bdd->query("INSERT INTO membres(pseudo, email, pass,sary) VALUES ('$pseudo','$email','$pass','$profil')");

                        header("Location: index.php");

                    }else{
                        return $erreur="Se compte exisste dejas";
                    }

                }else{
                    return $erreur ="Votre mots pass est incorrect";
                }
            }else{
                return $erreur ="Votre email est incorrect";
            }
        }else{
            return $erreur ="Veuillier remplir tout les champs";
        }
    }
    function affArticle($bdd){
        $base3 = $bdd->query("SELECT * FROM video");
        $bs = $base3->fetchAll();
        
        return $bs;
    }
    function filter($bdd){
        $rech = htmlspecialchars($_POST["achercher"]);

        $base4 = $bdd->prepare("SELECT * FROM video WHERE titre LIKE :rech OR Type LIKE :rech");

        $base4->execute(array(
            'rech'=>'%'.$rech.'%'
        ));
        $filtre= $base4->fetchAll();

        return $filtre;
    }
    function contacter(){
        $nom= htmlentities($_POST["name"]);
        $email= htmlentities($_POST["email"]);
        $mess= htmlentities($_POST["textarea"]);
        $validation = true;
        
        if(!empty($nom) && !empty($email) && !empty($mess)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $to= "fiononantsoa@gmail.com";

                $discu= "Nouveau message de '$nom'";
                
                $messenv= '
                <h1>Nouveau message de '.$nom.'</h1>
                <h2>Adresse e-mail : '.$email.'</h2>
                <p>'.nl2br($mess).'</p>    
                ';

                $headers = 'Form: '.$nom.' <'.$email.'>' . "\r\n";
                $headers.= 'MIME-Verision: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                mail($to, $discu, $messenv, $headers);

                unset($_POST['nom']);
                unset($_POST['email']);
                unset($_POST['textarea']);

            }else{
                return $error= "Votre @email n'est pas correct";
            }
        }else{
            return $error= "C'est vide";
        }
    }
    function creationComs($bdd){
        $coms = htmlspecialchars($_POST["comms"]);
        // $sary = $_SESSION["sary"];
        $pseudo = $_SESSION["user"];

        $Tabsary = $bdd->query("SELECT * FROM membres WHERE pseudo='$pseudo'");
        $T_sary = $Tabsary->fetchAll();
        $sary = $T_sary[0]["sary"];

        $base = $bdd->query("INSERT INTO commentaires(coms, user, sary) VALUES ('$coms','$pseudo','$sary')");

        header("Location: FAQ.php");


    }
    function affComs($bdd){
        $base5= $bdd->query("SELECT * FROM commentaires ORDER BY id ASC");
        $bs = $base5->fetchAll();

        return  $bs;
    }
    function voirPlus($bdd){
        $id = $_GET['id'];
        
        $base = $bdd->prepare("SELECT * FROM video WHERE id =?");
        $base->execute(array($id));
        $containBase = $base->fetch();

        return $containBase;

    }
    function addCommentaires($bdd){
        
        // echo "Connecter";
        $coms = htmlentities(nl2br($_POST["Icoms2"]));
        $pseudo = $_SESSION["user"];
        $id = intval($_GET['id']);

        $Tabsary = $bdd->prepare("SELECT * FROM membres WHERE pseudo =?");
        $Tabsary->execute(array($pseudo));

        $T_sary = $Tabsary->fetch();
        if($pseudo === "admin"){
            $sary = "admin.jpg";
        }else{
            $sary = $T_sary["sary"];
        }
        // print_r($sary);

        // echo''. $pseudo;
        
        $base = $bdd->query("INSERT INTO articlecoms(id, comsVideo, nom, sary) VALUES ('$id', '$coms', '$pseudo', '$sary')");
        
    }
    function affComsArticle($bdd){
        $id = intval($_GET['id']);

        $base= $bdd->prepare("SELECT * FROM articlecoms WHERE id=? AND sary !=''");
        $base->execute(array($id));
        
        $listComs= $base->fetchAll();

        return $listComs;
    }
    function makaSary($bdd){
        $pseudo = $_SESSION["user"];

        if(isset($_SESSION["user"])){
            if($_SESSION["user"]==="admin"){
               return $sary = "admin.jpg";
            }
        }
        // $id = intval($_GET['id']);

        $Tabsary = $bdd->prepare("SELECT * FROM membres WHERE pseudo =?");
        $Tabsary->execute(array($pseudo));

        $T_sary = $Tabsary->fetch();
        $sary = $T_sary["sary"];

        return $sary;
    }
    function recupMembre($bdd){
        $base= $bdd->query("SELECT * FROM membres");
        $lineT = $base->rowCount();

        $bs= $base->fetchAll();

        return $bs;
    }
    function creatMessAdmin($bdd, $dest){
        if(!empty($_POST["textArea"])){
            foreach ($dest as $mem){
                if($mem['id'] === $_GET["id"]){
                    $userDest = $mem['pseudo']; 
                    $mess = nl2br($_POST["textArea"]);
                    $id = $_GET["id"]; 

                    $base= $bdd->query("INSERT INTO messadmin(destinataire , mess, idantifiant ) VALUES ('$userDest','$mess','$id')");
                    
                }
            }
        }else{
            return "Ecrit quelque chose svp";
        }

        // return $_GE;
    }
    function messAdmin($bdd){
        $user = $_SESSION["user"];

        $base= $bdd->query("SELECT * FROM messadmin WHERE mess != '' AND destinataire='$user'");
        $bs = $base->fetchAll();

        return $bs;
    }

    // Function admin en creation

    function creation($bdd){
        $titre = $_POST['titre'];
        $sousTitre = $_POST['sousTitre'];
        $voirPlus = $_POST['voirplus'];
        $type = $_POST['type'];
        $sary = $_POST['sary'];

        if(!empty($titre) && !empty($sousTitre) && !empty($voirPlus)){

            // return $erreur= "C'est nickel";
            $base = $bdd->query("INSERT INTO video(titre, apropo, img, type, voirplus) VALUES ('$titre','$sousTitre','$sary','$type','$voirPlus')");

        }else{
            return $erreur ="C'est vide :(";
        }

    }

    function del($bdd){
        $del = intval($_GET["del"]);

        $base = $bdd->prepare("DELETE FROM video WHERE id= '$del'");
        $base->execute();

        header('Location: contenue.php');
    }
    function recupArticle($bdd){
        $id = (int)$_GET["id"];

        $base = $bdd->prepare("SELECT * FROM video WHERE id=?");
        $base->execute(array($id));
        $article = $base->fetch();

        return $article;
    }
    function modifier($bdd, $sary2){
        $titre = htmlspecialchars($_POST['titre']);
        $type = htmlspecialchars($_POST['type']);
        $sousTitre = nl2br($_POST['sousTitre']);
        $voirPlus = nl2br($_POST['voirplus']);
        $sary = $_POST['sary'];
        $id=(int)$_GET['id'];

        if(!empty($titre) && !empty($type) && !empty($sousTitre) && !empty($voirPlus)){
            if(!empty($sary)){
                $base = $bdd->prepare("UPDATE video SET titre=?, apropo=?, img=?, Type=?, voirplus=? WHERE id='$id'");
                $base->execute(array($titre, $sousTitre, $sary, $type, $voirPlus));

                header('Location: contenue.php');
            }else{
                $base = $bdd->prepare("UPDATE video SET titre=?, apropo=?, img=?, Type=?, voirplus=? WHERE id='$id'");
                $base->execute(array($titre, $sousTitre, $sary2, $type, $voirPlus));
                
                header('Location: contenue.php');
            }

        }
    }
?>