<?php

// les constantes

define('NOM_DE_MA_CONSTANTE', 'Ma super valeur');

echo NOM_DE_MA_CONSTANTE;

echo '<br>';
define('APP_NAME','Aston');

echo APP_NAME;

//define('MY_TABLE', array('a'));
//var_dump(MY_TABLE)

// les constantes magiques

echo '<br>'; // Renvoie à la ligne
echo __FILE__; // Renvoie le lien du fichier courant en local
echo '<br>';
echo __DIR__; // Renvoie le lien du répertoire courant
echo __LINE__; // Renvoie la ligne courante ici 22

echo '<br>';
echo basename(__FILE__); //Renvoie le nom du fichier courant
echo '<br>';
echo dirname(__DIR__); // Recupère le chemin avant le répertoire
echo  '<br>';
echo basename('C:\chemin\interdit\vers\index.php');
echo  '<br>';
echo dirname(dirname(__FILE__)); // L'ajout des dirname permet de remonter le lien vers la source
echo  '<br>';
echo dirname(dirname(dirname(__FILE__)));
echo  '<br>';
echo dirname(dirname(dirname(dirname(__FILE__))));