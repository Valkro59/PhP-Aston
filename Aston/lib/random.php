<?php

// Fonction qui permet de génèrer un code aléatoirement


function keygen($max = 5)
{
$chars = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789@#!&~-';

$len = strlen($chars); //strlen compte le nombre de caractères de la variabler

$key="";
for ($i = 0; $i < $max; $i++) {
;
$key .= $chars[rand(0, $len - 1)]; // rand génère un nombre aléatoire défini entre min(ici 0) et max (ici $len -1)
}
return $key;

}

?>