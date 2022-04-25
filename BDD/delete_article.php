<?php
session_start();

include "requetes.php";

deleteArticle($_GET["id_article"]);
// $fileName = $_POST["suppressed_img"];

unlink($fileName);

header("Location: ../structure/index.php");
