<?php
session_start();
include "../BDD/requetes.php";
$articles = getAllArticles();
$target_dir_article = "../assets/img/articles/";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Eval pour tester nos connaissances PHP - Avril 2022 - Page pour la création d'un nouvel article">

    <link rel="stylesheet" href="../assets/css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Tous les articles</title>
</head>

<body>
    <?php include "header.php"; ?>
    <main class="container">

        <section class="d-flex flex-row justify-content-evenly">
            <?php
            foreach ($articles as $key => $article) :
                $id_author = $article->id_user;
                $id_article = $article->id_article;
                $article_img = $article->img_article;
                $article_title = htmlspecialchars($article->name_article);
                $article_sum = htmlspecialchars($article->sum_article);
            ?>
                <article class="card" style="width: 18rem;">
                    <figure>
                        <img src="<?= $target_dir_article.$article_img ?>" class="card-img-top" alt="<?= $article_title ?>">
                    </figure>

                    <div class="card-body">
                        <h5 class="card-title"><?= $article_title ?></h5>
                        <p class="card-text"><?= $article_sum ?></p>
                        <a href="article_display.php?id_article=<?=$id_article?>&id_author=<?=$id_author?>" class="btn btn-primary">Lien vers l'article</a>
                    </div>
                </article>
            <?php endforeach ?>
        </section>

    </main>

    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>