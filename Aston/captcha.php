<?php

// fichier image

require 'lib/random.php' ; // 'require' retourne 'Fatal Error' en cas d'erreur, le 'include' ne retourne qu'un 'warning'

session_start();
$key = keygen();
$_SESSION['captcha'] = $key;

//On va génèrer une image en php (voir GD sur docs)
header('Content-Type: image/jpg');

$im = imagecreatetruecolor(90, 40); // taille image
$bg = imagecolorallocate($im, 249, 202, 36); // couleur fond
$fg = imagecolorallocate($im, 72, 52, 212);
$font = 'C:\Windows\Fonts\arial.ttf';

imagefill($im, 0, 0, $bg); //génèrer couleur fond image

imagettftext($im, 15, 0, 10, 30, $fg, $font, $key);

imagepng($im); // Charger image
imagedestroy($im); // Libèrer de la ressource, l'image est supprimée de la mémoire

//echo keygen();



