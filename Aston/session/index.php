<?php
//index.php
session_start();

// header('Content-Type: text/plain');
?>

<h1>Page d'accueil</h1>

Bonjour, <?=$_SESSION['username']; ?>
