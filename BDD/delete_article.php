<?php
session_start();

include "requetes.php";

deleteArticle();
$target_dir = "assets/img/upload/";
$fileName = $_POST["suppressed_img"];

unlink($fileName);

header("Location: ../structure/index.php");
