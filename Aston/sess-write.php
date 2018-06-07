<?php

// sess-write.php

session_start(); // Démarrer une session

echo session_id(); // Affiche l'id crée de la session

$_SESSION ['prenom'] = 'Valentin'; // Pour enregistrer l'information 'prenom' dans la session
$_SESSION ['nom']='Krolak';

$_SESSION['nimp'] = array(true,'Chuck');
