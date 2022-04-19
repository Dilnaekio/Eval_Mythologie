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

    <title>Se connecter</title>
</head>

<body>
    <!-- Le header -->
    <?php include "header.php"; ?>

    <main class="container">
        <!-- Formulaire pour la connexion d'un utilisateur -->
        <section class="p-4">
            <form action="#" method="post">
                <label for="connection-pseudo">Nom utilisateur : </label>
                <input type="text" name="connection-pseudo" id="connection-pseudo" class="mb-2">

                <label for="connection-mail">Adresse mail : </label>
                <input type="text" name="connection-mail" id="connection-mail" class="mb-2">

                <label for="connection-pwd">Mot de passe : </label>
                <input type="text" name="connection-pwd" id="connection-pwd" class="mb-2">

                <input type="submit" name="submit-connection" value="Se connecter">
            </form>
        </section>
    </main>

    <?php
    if(isset($_POST["submit-connection"])){
        var_dump($_POST["connection-pseudo"]);
        var_dump($_POST["connection-mail"]);
        var_dump($_POST["connection-pwd"]);
        $infos = getUserInfos($_POST["connection-pseudo"]);
        var_dump(password_verify($_POST["connection-pwd"], $infos->mdp_user));
        $testMdp = password_verify($_POST["connection-pwd"], $infos->mdp_user);
    };

    // TODO : set up la super globale session pour la connexion réussie + renvoyer vers la page d'accueil (ajouter la possibilité de se déco) + message accueil personnalisé
    ?>

    <!-- Le footer -->
    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>