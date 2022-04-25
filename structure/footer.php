<footer class="mt-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fs-1">
        <div class="container-fluid padding-nav">
            <a class="navbar-brand" href="#">Mythos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- TODO : changer la couleur texte des liens pour une couleur plus claire -->
            <div class="collapse navbar-collapse justify-content-evenly" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item m-1">
                        <a class="nav-link" aria-current="page" href="#">Haut de page</a>
                    </li>
                    <!-- Ici, je vérifie pour la balise <li> suivante si une session est ouverte ou non. Si elle ne l'est pas, le visiteur ne peut pas ajouter d'article -->
                    <?php try {
                        if (!isset($_SESSION["user_name"])) {
                        } else { ?>

                            <?php if ($_SESSION["user_rank"] === "admin") { ?>
                                <li class="nav-item m-1">
                                    <a class="nav-link" href="article_creation.php">Ajouter un article</a>
                                </li>
                    <?php }
                        }
                    } catch (Exception $e) {
                        $e->getMessage();
                    }; ?>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="article_display_all.php">Articles</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</footer>