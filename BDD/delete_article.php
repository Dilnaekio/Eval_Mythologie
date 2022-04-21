<?php
session_start();

include "requetes.php";

deleteArticle();
header("Location: ../structure/index.php");
