<footer>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fs-1">
        <div class="container-fluid">
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

        </div>
    </nav>
</footer>