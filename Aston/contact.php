<?php

// var_dump($_POST); Equivalent du console.log de JS

//$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null; //condition ternaire ici, elle retourne le prénom si celui-ci est bien défini
// Isset sert à demander  si ce qu'il y a entre () est bien définie (retourne 'true') et différente de NULL (retourne 'false' dans ce cas)

//$prenom = $_POST['prenom'] ?? null; Autre condition qui ne fonctionne que sur PHP7
//$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
//$phone = isset($_POST['phone']) ? $_POST['phone'] : null;

//Fonction qui permet de simplifier les trois lignes au-dessus

function getPOST ($name, $default = null) {
    if (isset($_POST[$name])){
        return $_POST[$name];
    }
    return $default;
}
$test = trim('    / toto /        ',"'/',' '"); // trim supprime par défaut les espaces, l'attribut charlist permet de définir quels types de caractères à supprimer
var_dump($test);
//var_dump(getPOST('email', 'toto@gmail.com'));

$prenom = getPOST('prenom');
$nom = getPOST('nom');
$phone = getPOST('phone');

function isEmpty ($value) {
   return !empty(trim($value));
}


if(isEmpty($prenom) && isEmpty($nom) && isEmpty($phone)) {
//si la variable n'est pas vide, on supprime les blancs dans la variable

   $row = "$prenom;$nom;$phone\r\n";
// le r est le retour à la ligne de linux, le n celui de windows

  file_put_contents('contact.csv', $row, FILE_APPEND);
// csv pour COMMA SEPARATED VALUE (reconnu par tous les tableurs)
// file_put_contents pour envoyer les données, utile pour sauvegarder, ici dans un tableur
}
?>
<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>

<?php if ($prenom) : ?>
<div>
    Vous êtes <strong><?php echo "$prenom $nom"; ?></strong> et votre numéro de téléphone est le <strong><?php echo $phone; ?></strong>
<!-- strong sert à mettre en valeur l'élément, ici en gras -->
</div>
<?php endif; ?>

<!-- form>(div>label+input)*3 -->
<form action="contact.php" method="post">
    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>">
    </div>
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>">
    </div>
    <div>
        <label for="phone">N°Téléphone</label>
        <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
    </div>
    <button type="submit">Ajouter</button>
</form>
<div>
    <h2>Liste des contacts</h2>
    <?php

        $rows = file('contact.csv');
    ?>
<!--Pour récupèrer la table de données, ici seulement le 1 contact (id 0), le explode permet de casser la chaîne ici au niveau de chaque ; -->

<!-- Création du tableau qui va récupèrer les données -->
<table>
    <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Téléphone</th>
    </tr>
    <?php for ($i =0; $i < count($rows); $i++) : ?> <!-- Pour parcourir les lignes du tableau -->
    <?php $contact = explode(';', $rows[$i]);?> <!-- On casse la chaîne par rapport aux symboles ici ';' -->
    <tr>
        <td><?php echo $contact[0]; ?></td>
        <td><?php echo $contact[1]; ?></td>
        <td><?php echo $contact[2]; ?></td>
    </tr>
    <?php endfor; ?>
</table>

</div>
</body>
</html>