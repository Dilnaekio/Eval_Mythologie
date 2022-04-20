<?php
include "../BDD/requetes.php";
include "header.php";
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

    <main class="container">

        <!-- TODO:  1 - récupérer les articles
                    2 - forEach pour créer une button type button avec un aria-label évoluant en fonction du nombre de slide => à faire dans le containeur"carousel-indicators"
                    3 - forEach pour créer les carousel-item => dans le containeur carousel-inner -->
        <section id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button> -->
            </div>
            <div class="carousel-inner">
                <article class="carousel-item active">
                    <!-- TODO : envoyer les bonnes informations via GET pour les afficher sur la page article_display.php -->
                    <a href="structure/article_display.php">
                        <!-- TODO : changer affichage de l'image => en w-100 elle se pixelise vu qu'elle prend 100% de la width du parent-->
                        <!-- TODO : changer la SRC img par le véritable lien stocké en BDD -->
                        <figure>
                            <img src="https://picsum.photos/200" class="d-block w-100" alt="Nom de l'image">
                        </figure>
                    </a>

                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="title_article">Titre de l'article</h2>
                        <p class="sum_article">Résumé de l'article</p>
                    </div>
                </article>

                <!-- Bouton contrôlant l'affichage du carrousel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
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