<?php
session_start();

include "requetes.php";

$uploadOk = 1;
$errors = [];
$target_dir = "../assets/img/avatars/";

$fileName = explode(".", htmlspecialchars($_FILES["inscription-avatar"]["name"]));
$newFileName = htmlspecialchars($_POST["inscription-pseudo"]) . "." . end($fileName);
$target_file = $target_dir . basename($newFileName);

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Vérifie que le bouton a bien été set up, puis si c'est une image et donne son format
if (isset($_POST["submit-inscription"])) {
    $check = getimagesize($_FILES["inscription-avatar"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if (checkUserExist($_POST["inscription-pseudo"])) {
    $uploadOk = 0;
    $errors[] = "<p>Erreur : le pseudo est déjà utilisé !</p>";
}

// Vérifie si l'image existe déjà
if (file_exists($target_file)) {
    // Renvoie un get pour dire que l'image existe déjà
    $uploadOk = 0;
    $errors[] = "<p>Erreur : l'image utilisateur existe déjà !</p>";
}

// Vérifie que la taille du fichier ne dépasse pas celle max dans php.ini
if ($_FILES['inscription-avatar']['error'] == UPLOAD_ERR_INI_SIZE) {
    header("Location:$invalid_size");
    exit();
}


// Vérifie que le fichier ne fait pas plus d'1mo
if ($_FILES["inscription-avatar"]["size"] > 1000000) {
    $uploadOk = 0;
    $errors[] = "<p>Erreur : la taille du fichier doit être inférieure à 1MO.</p>";
}

// Vérifie le format de l'image
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $uploadOk = 0;
    $errors[] = "<p>Erreur : le format du fichier doit être jpg, jpeg ou png.</p>";
}

// Si tout est OK, ajouter l'image dans le dossier destinataire + add user sur BDD + rediriger avec un get confirmant succès
if ($uploadOk == 1) {
    move_uploaded_file($_FILES["inscription-avatar"]["tmp_name"], $target_file);
    addUser(htmlspecialchars($_POST["inscription-pseudo"]), htmlspecialchars($_POST["inscription-mail"]), $newFileName, htmlspecialchars($_POST["inscription-pwd"]));
    $_SESSION["errors"] = $errors;

    header("Location: ../structure/connection.php");
} else {
    $_SESSION["errors"] = $errors;
    header("Location: ../structure/inscription.php");
}
// TODO : si j'ai une erreur lors de la création, les autres étapes vont quand même se faire et peuvent générer une autre erreur lors de la deuxième tentative