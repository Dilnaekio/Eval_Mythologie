<?php
session_start();
include "../BDD/requetes.php";
$articles = getAllArticles();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Eval pour tester nos connaissances PHP - Avril 2022">

    <link rel="stylesheet" href="../assets/css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Mythologie</title>
</head>

<body>

    <?php include "header.php"; ?>
    <main class="container">

        <section id="carousel-articles" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <?php
                $target_dir_article = "../assets/img/articles/";

                // Pour chaque article, j'ajoute un item au carrousel. D'abord je teste quel est le premier article pour lui ajouter la classe active
                foreach ($articles as $key => $article) :
                    $id_author = $article->id_user;
                    $id_article = $article->id_article;
                    $article_img = $article->img_article;
                    $article_title = $article->name_article;
                    $article_sum = $article->sum_article;

                    if ($key === array_key_first($articles)) { ?>

                        <article class="carousel-item active">
                            <!-- TODO : envoyer les bonnes informations via GET pour les afficher sur la page article_display.php => id_author id_article-->
                            <a href="structure/article_display.php">
                                <!-- TODO : changer affichage de l'image => en w-100 elle se pixelise vu qu'elle prend 100% de la width du parent-->
                                <figure>
                                    <img src="<?= $target_dir_article . $article_img ?>" class="d-block w-100" alt="<?= $article_img ?>">
                                </figure>
                            </a>

                            <div class="carousel-caption d-none d-md-block presentation">
                                <h2 class="title_article"><?= $article_title ?></h2>
                                <p class="sum_article"><?= $article_sum ?></p>
                            </div>
                        </article>
                    <?php } else { ?>
                        <article class="carousel-item">
                            <!-- TODO : envoyer les bonnes informations via GET pour les afficher sur la page article_display.php => id_author id_article-->
                            <a href="structure/article_display.php">
                                <!-- TODO : changer affichage de l'image => en w-100 elle se pixelise vu qu'elle prend 100% de la width du parent-->
                                <figure>
                                    <img src="<?= $target_dir_article . $article_img ?>" class="d-block w-100" alt="<?= $article_img ?>">
                                </figure>
                            </a>

                            <div class="carousel-caption d-none d-md-block presentation">
                                <h2 class="title_article"><?= $article_title ?></h2>
                                <p class="sum_article"><?= $article_sum ?></p>
                            </div>
                        </article>
                <?php }
                endforeach;
                ?>

                <!-- TODO : Il y a un problème de navigation avec les boutons du carrousel => voir l'étape 2 du todo précédant le foreach-->
                <!-- Bouton contrôlant l'affichage du carrousel -->
                <button class="carousel-control-prev presentation" type="button" data-bs-target="#carousel-articles" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next presentation" type="button" data-bs-target="#carousel-articles" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
        </section>
    </main>

    <!-- Le footer -->
    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>