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
    <meta name="description" content="Eval pour tester nos connaissances PHP - Avril 2022">

    <link rel="stylesheet" href="assets/css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>S'inscrire</title>
</head>

<body>

    <?php include "header.php"; ?>

    <main class="container text-center">
        <!-- Formulaire pour l'inscription d'un utilisateur -->
        <section class="p-4">
            <form action="../BDD/add_user.php" method="post" enctype="multipart/form-data" class="d-flex flex-column">
                <label for="inscription-pseudo">Nom utilisateur : </label>
                <input type="text" name="inscription-pseudo" id="inscription-pseudo" class="mb-2" required>

                <label for="inscription-mail">Adresse mail : </label>
                <input type="text" name="inscription-mail" id="inscription-mail" class="mb-2" required>

                <label for="inscription-pwd">Mot de passe : </label>
                <input type="text" name="inscription-pwd" id="inscription-pwd" class="mb-2" required>

                <label for="inscription-avatar">Avatar : </label>
                <input type="file" name="inscription-avatar" id="inscription-avatar" class="mb-2" required>

                <input type="submit" name="submit-inscription" value="S'enregistrer">
            </form>
        </section>

        <!-- Indications pour s'enregistrer correctement -->
        <!-- TODO : remplir les indications -->
        <!-- TODO : ajouter un regex pour vérifier la validité du mdp ? -->
        <!-- TODO : changer la couleur + add icon en fonction de ce que l'utilisateur entre ? -->
        <section class="d-flex flex-column align-items-center">
            <h2>Conditions d'enregistrement</h2>
            <ul>
                <li>Pseudo unique</li>
                <li>Adresse mail valide</li>
                <li>Mot de passe ayant : <ul>
                        <li>Une majuscule et une minuscule</li>
                        <li>Au moins un chiffre</li>
                        <li>Au moins un caractère spécial</li>
                        <li>Au moins 8 caractères</li>
                    </ul>
                </li>
            </ul>
        </section>

        <section id="errors">
            <?php
            // Si des erreurs sont enregistrées dans la super globale SESSION => elles seront affichées
            if (isset($_SESSION["errors"])) {
                $errors = $_SESSION["errors"];

                foreach ($errors as $result => $value) {
                    echo "<p>" . $value . "</p>";
                }
            }
            ?>
        </section>
    </main>

    <!-- Le footer -->
    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>