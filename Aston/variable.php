<?php

//$_GET
//$_POST
//$_REQUEST == $_GET et $_POST
//$_SERVER
//$_COOKIE
//$_SESSION
//$_FILES
//$_ENV
//$_GLOBALS

var_dump($_REQUEST); // mauvaise écriture
echo '<br>';

//var_dump($_SERVER);
echo $_SERVER['HTTP_USER_AGENT']; //Récupère les différentes informations du serveur

setCookie('color', 'yellow'); // Créer un cookie, s'affiche dans F12 la page, dans réseau, cliquer sur la requête
setCookie('name','John');

date_default_timezone_set('Europe/Paris');


echo 60*60; //3600

echo'<br>';

echo time(); // Temps courant, écoulé en seconde depuis 1970

echo '<br>';
echo time()+3600;
echo'<br>';

setCookie('age','50',time()+ 60*60,'/Aston','aston.com',true,true); // path est le chemin qui permet de définir dans quelle URL le cookie est valide, secure permet de valider la sécurité,
// expire permet de définir une date d'expiration
echo $_COOKIE['color'];

echo'<br>';

echo $_COOKIE['age'];




?>