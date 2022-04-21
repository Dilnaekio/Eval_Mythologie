<?php
session_start();
include "../BDD/requetes.php";
// Avant de charger la page, je récupère en BDD les informations nécessaires
$article = getArticle($_GET["id_article"]);
$author_infos = getAuthorInfos($_GET["id_author"]);

// Puis j'associe les données à des variables que je vais réutiliser
$title = htmlspecialchars($article->name_article);
$date = date_create($article->creation_date_article);
$format_date = date_format($date, 'l F Y H:i:s');
$img = $article->img_article;
$content = htmlspecialchars($article->content_article);
$author = htmlspecialchars($author_infos->name_user);
$target_dir_article = "../assets/img/articles/";

// TODO : comme je l'ai vu plus tôt, le HTMLSPECIALCHARS casse mes " ou ' dans les textes
// TODO : trouver un moyen non déprécié de traduire la date en FR

// Je récupère le rank de l'utilisateur avant la création du HTML
$rank = $_SESSION["user_rank"];
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

    <title><?= $title ?></title>
</head>

<body>

    <?php include "header.php"; ?>

    <main class="container">
        <h1><?= $title ?></h1>
        <section>
            <article>
                <p><?= $content ?></p>
            </article>

            <aside>
                <figure>
                    <img src="<?= $target_dir_article . $img ?>" alt="<?= $title ?>">
                </figure>
            </aside>

            <p>Article créé par <?= $author ?> le <?= $format_date ?></p>
        </section>

        <?php if($rank === "admin"){ ?>
        <section>
            <form action="../BDD/delete_article.php" method="post">
                <!-- TODO : ce serait bien d'ajouter une demande de confirmation avant suppression -->
                <input type="hidden" id="suppressed_article" name="suppressed_article" value="<?= $_GET["id_article"] ?>">
                <input type="submit" name="submit-suppression" value="Supprimer" class="bg-danger rounded">
            </form>
        </section>
        <?php }; ?>
    </main>

    <!-- Le footer -->
    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>