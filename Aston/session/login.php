<?php
// Ici traitement des données du formulaire

session_start();// On démarre la session

$captcha  = $_SESSION['captcha']?? null; // le captcha qui est génèré par l'image
$username = $_POST['username']  ?? null;
$password = $_POST['password']  ?? null;
$key      = $_POST['key']       ?? null; // le captcha que l'utilisateur aura saisie

$users= ['Jack'=>'0123',
         'Stan'=>'4567',
         'William'=>'0203'
];

if($captcha === $key && isset($users[$username]) && $password === $users[$username]){ // L'ajout du isset ici permet de vérifier si le username écrit est bien compris dans le tableau
    unset($_SESSION['captcha']);
    $_SESSION['username'] = $username; // On enregistre les informations utiles de l'utilisateur
    header('Location: index.php'); // Pour rediriger vers la page index.php

}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> <!-- Intégrer bootstrap -->
    <link rel="stylesheet" href="style.php">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>

<div class="container">
<form action="login.php" method="post">
    <div class="from-group">
        <label for="username">Identifiant</label>
        <input class="form-control" type="text" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input class="form-control" type="password" name="password" id="password">
    </div>
    <div class="form-group row no-gutters">
        <div class="col-3">
        <img id="captcha" src="/Aston/captcha.php" width="80"/>
        <button class="btn btn-default" id="refresh"><i class="fa fa-sync-alt"></i></button>
        </div>
        <div class="col-3">
        <input class="form-control" type="text" name="key"/>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Connexion</button>
</form>
</div>

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">

</script>
<script>
    $('#refresh').on('click', function(e){
        e.preventDefault(); // Stoppe le comportement de l'évènement
        $('#captcha').attr('src', '/Aston/captcha.php?' + Math.random());
    });

</script>


</body>
</html>