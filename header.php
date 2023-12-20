    <header>
            <div class="containLogo">
                <p class="logo">GNE<span class="couleurText">BRO</span></p>
            </div>

            <div class="containMenuAll">
                <div class="containUl">

                    <ul class="contain-menu">
                        <div class="containNavList <?=$back1?>">
                            <div class="icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <li class="nav-list"><a href="Acceuil.php" class="nav-link">Acceuil</a></li>
                        </div>
                        <div class="containNavList <?=$back2?>">
                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <li class="nav-list"><a href="contact.php" class="nav-link">Contact</a></li>
                        </div>
                        
                        <div class="containNavList <?=$back3?>">
                            <div class="icon">
                                <i class="fas fa-comment"></i>
                            </div>
                            <li class="nav-list"><a href="FAQ.php" class="nav-link">FAQ</a></li>
                        </div>
                        <?php 
                            if(isset($_SESSION["user"])){
                                if($_SESSION["user"]=== "admin"){
                        ?>
                        <div class="containNavList">
                            <div class="icon">
                                <i class="fas fa-user-alt"></i>
                            </div>
                            <li class="nav-list"><a href="admin.php" class="nav-link">Admin</a></li>
                        </div>
                        <?php
                                } 
                            }
                        ?>

                    </ul>
                </div>

                <div class="containUl2">
                    <ul class="contain-menu2">
                        <div class="containNavList">
                            <div class="icon">
                                <i class="fas fa-door-open"></i>
                            </div>
                            <li class="nav-list"><a href="index.php" class="nav-link">Log out</a></li>
                        </div>
                    </ul>
                </div>
            </div>
    </header>

    <aside class="mini-profil">
        <div class="cadreProfil">
            <div class="profil">
                <div class="containPhoto">
                    <img src="img/<?= $saryUser;?>" alt="" srcset="">
                </div>
                <div class="name">
                    <p class="pseudo"><?= $_SESSION['user'];?></p>
                    <p class="identifiant">@<?= $_SESSION['user'];?></p>
                </div>
                <div class="notif">
                    <div class="notif">
                        <i class="fas fa-comment-alt"></i>
                    </div>
                    <div class="notif">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="notif">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
            </div>
            <hr>
            <div class="commentaire">
                <?php foreach ($messAdmin as $mess): ?>
                <div class="boiteVideo">
                    <div class="video">
                        <img src="img/admin.jpg" alt="" srcset="">
                    </div>
                    <div class="apropos">
                        Pour <strong style="color: #911e91;"><?= $mess['destinataire']; ?> </strong><br><?= $mess['mess']; ?> 
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <hr>
            <div class="mode">
                <div class="containMode">
                    <div class="iconJour">
                        <i class="fas fa-sun"></i>
                    </div>
                    <div class="btnJN">
                        <div class="on-off"></div>
                    </div>
                    <!-- <div class="iconNuit"></div> -->
                </div>
            </div>
        </div>
    </aside>