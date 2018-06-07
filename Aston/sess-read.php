<?php

session_start();

echo 'Hello ', $_SESSION['prenom'] .' '. $_SESSION['nom'];

var_dump($_SESSION['nimp']);