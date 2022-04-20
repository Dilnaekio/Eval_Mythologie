<?php
include "../BDD/requetes.php";
include "../controllers/redirect.php";
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

    <title>Se connecter</title>
</head>

<body>

    <main class="container">
        <!-- Formulaire pour la connexion d'un utilisateur -->
        <section class="p-4">
            <form action="#" method="post" class="d-flex flex-column align-items-center">
                <label for="connection-pseudo">Nom utilisateur : </label>
                <input type="text" name="connection-pseudo" id="connection-pseudo" class="con mb-2">

                <label for="connection-pwd">Mot de passe : </label>
                <input type="text" name="connection-pwd" id="connection-pwd" class="mb-2">

                <input type="submit" name="submit-connection" value="Se connecter">
            </form>
        </section>
    </main>

    <?php
    // Si l'utilisateur clique sur submit-connection, vérifie les infos entrées
    if (isset($_POST["submit-connection"])) {
        $infos = getUserInfos($_POST["connection-pseudo"]);
        $testMdp = password_verify($_POST["connection-pwd"], $infos->mdp_user);

        // Si true, set up les variables de session et renvoie vers la page d'accueil. Je n'ai besoin que de tester le mdp car cela signifie qu'il a été capable de récupérer un utilisateur en BDD et que le mdp entré correspond à cet utilisateur
        if ($testMdp) {

            // Je récupère toutes les données en BDD qui pourront être utilisées pour cette session
            $_SESSION["logged_in"] = true;
            $_SESSION["user_id"] = $infos->id_user;
            $_SESSION["user_name"] = $infos->name_user;
            $_SESSION["user_mail"] = $infos->mail_user;
            $_SESSION["user_avatar"] = $infos->img_user;
            $_SESSION["user_rank"] = $infos->rank;

            redirect("index.php");
        } else {
            echo "<p> <span style=\"color:rgb(255,0,0);text-align:center;\">Mauvais identifiants, désolé ! :-)<strong> ";
        }
    };

    // TODO : set up la super globale session pour la connexion réussie + renvoyer vers la page d'accueil (ajouter la possibilité de se déco) + message accueil personnalisé
    ?>

    <!-- Le footer -->
    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>