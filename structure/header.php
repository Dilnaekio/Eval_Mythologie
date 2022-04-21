<?php
$target_dir = "../assets/img/avatars/";
?>

<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fs-1">
        <div id="header" class="container-fluid padding-nav">
            <a class="navbar-brand" href="#">Mythos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- TODO : changer la couleur texte des liens pour une couleur plus claire -->
            <div class="collapse navbar-collapse justify-content-evenly" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item m-1">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <!-- Ici, je vérifie pour la balise <li> suivante si une session est ouverte ou non. Si elle ne l'est pas, le visiteur ne peut pas ajouter d'article -->
                    <?php try {
                        if (!isset($_SESSION["user_name"])) {
                        } else { ?>
                            <li class="nav-item m-1">
                                <a class="nav-link" href="article_creation.php">Ajouter un article</a>
                            </li>
                    <?php }
                    } catch (Exception $e) {
                        $e->getMessage();
                    }; ?>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="article_display_all.php">Articles</a>
                    </li>
                    <!-- Ici, je vérifie si une session est ouverte ou non. Si elle l'est, inutile d'afficher les liens connexion/inscription -->
                    <?php try {
                        if (!isset($_SESSION["user_name"])) { ?>
                            <li class="nav-item m-1">
                                <a class="nav-link" href="connection.php">Connexion</a>
                            </li>
                    <?php }
                    } catch (Exception $e) {
                        $e->getMessage();
                    }; ?>
                    <?php try {
                        if (!isset($_SESSION["user_name"])) { ?>
                            <li class="nav-item m-1">
                                <a class="nav-link" href="inscription.php">Inscription</a>
                            </li>
                    <?php }
                    } catch (Exception $e) {
                        $e->getMessage();
                    }; ?>
                </ul>
            </div>

            <?php try {
                if (isset($_SESSION["user_name"])) { ?>
                    <figure class="text-center figure m-0 p-2">
                        <img src="<?= $target_dir . $_SESSION["user_avatar"] ?>" id="avatar" class="figure-img" alt="Avatar de <?php $_SESSION["user_name"] ?>">
                    </figure>
            <?php };
            } catch (Exception $e) {
                $e->getMessage();
            }; ?>

            <!-- TODO : ajouter des nouvelles pages en rapport avec les liens -->
            <div class="btn-group">
                <?php
                try {
                    if (isset($_SESSION["user_name"])) { ?>

                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> <?= $_SESSION["user_name"] ?></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mes informations</a></li>
                            <li><a class="dropdown-item" href="#">Mes articles</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../controllers/deconnection.php">Se déconnecter</a></li>
                        </ul>
                    <?php } else { ?>
                        <button type="button" class="btn btn-success"><a href="connection.php">Connexion</a></button>
                <?php }
                } catch (Exception $e) {
                    $e->getmessage();
                } ?>
            </div>
        </div>
    </nav>
</header>