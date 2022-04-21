<?php
    session_start();
    session_destroy();
    header('Location: ../structure/connection.php');
?>