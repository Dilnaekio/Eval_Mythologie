<?php
session_start();

$target_dir = "../assets/img/avatars/";
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fs-1">
        <div id="header" class="container-fluid">
            <a class="navbar-brand" href="#">Mythos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- TODO : changer la couleur texte des liens pour une couleur plus claire -->
            <!-- TODO : il y a un problème avec les liens => en fonction de la page sur laquelle nous sommes, le chemin dossier n'est plus bon. 
            Exemple : si je suis sur ajouter un article, index.php devient ../index.php. Si je suis sur index.php, accueil doit mener à index.php et non ../index.php
            SOLUTION POSSIBLE : avoir un header pour l'index, et un autre pour tous les autres liens nav-->
            <div class="collapse navbar-collapse justify-content-evenly" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item m-1">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="article_creation.php">Ajouter un article</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="article_display_all.php">Articles</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="connection.php">Connexion</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="inscription.php">Inscription</a>
                    </li>
                </ul>
            </div>

            <?php 
                if (isset($_SESSION["user_name"])) { ?>
                    <figure class="text-center figure m-0 p-2">
                        <!-- TODO : redéfinir la taille de l'avatar pour qu'il soit rond et petit -->
                        <img src="<?= $target_dir.$_SESSION["user_avatar"]?>" id="avatar" class="figure-img" alt="Avatar de <?php $_SESSION["user_name"] ?>">
                    </figure>
                    <?php }; ?>

            <!-- TODO : ajouter des nouvelles pages en rapport avec les liens -->
            <div class="btn-group">
                <?php
                try {
                    // TODO : HTLMSPECIALCHAR
                    if (isset($_SESSION["user_name"])) { ?>
                        
                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> <?= $_SESSION["user_name"] ?></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mes informations</a></li>
                            <li><a class="dropdown-item" href="#">Mes articles</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="deconnection.php">Se déconnecter</a></li>
                        </ul>
                    <?php } else { ?>
                        <button type="button" class="btn btn-danger"><a href="connection.php">Connexion</a></button>
                <?php }
                } catch (Exception $e) {
                    $e->getmessage();
                } ?>
            </div>
        </div>
    </nav>
</header>