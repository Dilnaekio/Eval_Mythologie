<?php
session_start();

include "requetes.php";

deleteArticle();
$fileName = $_POST["suppressed_img"];

unlink($fileName);

header("Location: ../structure/index.php");
