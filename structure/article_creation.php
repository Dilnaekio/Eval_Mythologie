<?php
session_start();
include "../BDD/requetes.php";
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

    <title>Ajouter un article</title>
</head>

<body>

    <?php
    if ($_SESSION["user_rank"] !== "admin") {
        header("location: index.php");
    }
    include "header.php"; ?>

    <main class="container text-center">
        <!-- TODO: Tout caractère spécial est mal géré niveau contenu -->

        <section class="d-flex flex-column">
            <h1>Ajouter un article</h1>
            <!-- Formulaire pour la création d'un nouvel article -->
            <form action="../BDD/add_article.php" method="post" enctype="multipart/form-data" class="d-flex flex-column">
                <!-- Titre de l'article-->
                <label for="article-title">Titre de l'article</label>
                <input type="text" name="article-title" id="article-title" placeholder="Exemple : Guilhaume le Grand" required>

                <!-- Résumé de l'article-->
                <label for="article-sum">Résumé de l'article</label>
                <input type="text" name="article-sum" id="article-sum" placeholder="Un article consacré à Guilaume le Grand, un expert du PHP qui doit nous supporter toute la journée !" required>

                <!-- Contenu de l'article -->
                <label for="article-content">Contenu de l'article</label>
                <textarea name="article-content" id="article-content" cols="30" rows="10" placeholder="Contenu de l'article..." required></textarea>

                <!-- TODO : cela pourrait être cool d'ajouter une prévisualisation de l'image avant submit -->
                <!-- Image de l'article -->
                <label for="article-img">Image de l'article :</label>
                <input type="file" name="article-img" id="article-img" required>

                <input type="submit" name="submit-article" value="Envoyer l'article">
            </form>
        </section>


    </main>

    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>