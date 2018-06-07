<?php

define('DS', DIRECTORY_SEPARATOR);

//var_dump($_FILES);

$errors =[];
$exts = ['jpeg', 'jpg', 'png', 'gif'];

if (!empty($_FILES)){
$image = $_FILES['monfichier'];
$tmpPath = $image['tmp_name'];

switch ($image['error']) {
    case UPLOAD_ERR_NO_FILE:
        $errors[] = "Aucune fichier n'a été téléchargé";
        break;
    case UPLOAD_ERR_INI_SIZE:
        $errors[] = "La taille du fichier téléchargé excède la valeur maximale";
        break;
    case UPLOAD_ERR_CANT_WRITE:
        $errors[] = "Echec de l'écriture du fichier sur le disque";
        break;
}

    $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
    if (!in_array(strtolower($ext), $exts)){ // strtolower permet de rendre l'extension en minuscule
        $errors[] = 'Extension non valide';
    }

    var_dump($errors);

    define('Max', round((1024*1024)*2)); // 2Mo, définir la limite du fichier

    if (($image['size'])> Max) {
        $errors[] = 'Poids maximum ' . (Max/1024/1024).'Mo';
    }


    if (empty($_errors)){
        $b = random_bytes(8);
        $name = bin2hex($b);
        $destination = __DIR__ . DS . 'img/'. $name . '.'.$ext;
        $ok = move_uploaded_file($tmpPath, $destination); // Pour copier image dans le répertoire
}
//header('Content-Type: image/png');
//echo file_get_contents($image['tmp_name']);
//exit;
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uploader</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Uploader</h1>
<?php if(!empty($errors)):?>
    <ul class="alert alert-danger">
        <?php foreach ($errors as $err) : ?>
        <li><?= $err ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>


    <form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="monfichier"></label>
        <input type="file" name="monfichier" id="monfichier">
    </div>
        <button type="submit" class="btn btn-success">Envoyer</button>
    </form>
</div>
</body>
</html>