<!-- TODO : Ajouter l'ID de l'utilisateur grâce à la variable session id -->

<?php
session_start();

include "requetes.php";

$uploadOk = 1;
$errors = [];
$target_dir = "../assets/img/articles/";

$fileName = explode(".", htmlspecialchars($_FILES["article-img"]["name"]));
$newFileName = htmlspecialchars($_POST["article-title"]) . "." . end($fileName);
$target_file = $target_dir . basename($newFileName);

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Vérifie que le bouton a bien été set up, puis si c'est une image et donne son format
if (isset($_POST["submit-article"])) {
    $check = getimagesize($_FILES["article-img"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if (checkUserExist($_POST["article-title"])) {
    $uploadOk = 0;
    $errors[] = "<p>Erreur : Le titre de l'article est déjà utilisé !</p>";
}

// Vérifie si l'image existe déjà
if (file_exists($target_file)) {
    // Renvoie un get pour dire que l'image existe déjà
    $uploadOk = 0;
    $errors[] = "<p>Erreur : l'image de l'article existe déjà !</p>";
}

// Vérifie que la taille du fichier ne dépasse pas celle max dans php.ini
if ($_FILES['article-img']['error'] == UPLOAD_ERR_INI_SIZE) {
    header("Location:$invalid_size");
    exit();
}


// Vérifie que le fichier ne fait pas plus d'10mo
if ($_FILES['article-img']["size"] > 10000000) {
    $uploadOk = 0;
    $errors[] = "<p>Erreur : la taille du fichier doit être inférieure à 10 MO.</p>";
}

// Vérifie le format de l'image
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $uploadOk = 0;
    $errors[] = "<p>Erreur : le format du fichier doit être jpg, jpeg ou png.</p>";
}

// Si tout est OK, ajouter l'image dans le dossier destinataire + add user sur BDD + rediriger avec un get confirmant succès
if ($uploadOk == 1) {
    move_uploaded_file($_FILES['article-img']["tmp_name"], $target_file);
    addArticle(htmlspecialchars($_POST["article-title"]), htmlspecialchars($_POST["article-sum"]), htmlspecialchars($_POST["article-content"]), $newFileName, $_SESSION["user_id"]);
    $_SESSION["errors"] = $errors;

    header("Location: ../structure/index.php");
} else {
    $_SESSION["errors"] = $errors;
    header("Location: ../structure/article_creation.php");
}