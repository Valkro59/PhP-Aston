<?php
// Les types

// int, boolean, string, null, float, array, ressource, object

// Les ressources

$fp = fopen('contact.csv', 'r'); // r = read; fopen ouvre la ressource


echo gettype($fp); //Renvoie le type de la variable

var_dump($fp);

echo fread($fp, 1024); // Permet d'afficher le contenu de la ressource ici le tableur 'contact.csv'

fclose($fp); // Fermer l'ouverture de la ressource