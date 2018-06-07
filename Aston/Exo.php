<?php

$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium et iusto laborum omnis provident ullam?';
echo substr($text,0,30). '...';


echo 1, 2, 5;

print ('Hello World');


function debug($value) {
    echo '<pre>'; // Changer l'affichage pour un meilleur visu du tableau suivant avec la balise <pre>
    print_r($value);

    echo '<pre/>';
}


debug (range('a','z')); // Va afficher ici l'ensemble des lettres de l'alphabet de a à z
debug (range('A','Z')); // Idem mais en majuscules

// Création tableau en php

$alpha = array(
    5 => 'a',
    11 => 'b', // Le rajout de 11 => impose la valeur b à la ligne 11 , c est ensuite incrémenté à 12
    'c'
);

// Rappel : Un tableau commence toujours à l'élément 0

$alpha[] = 'd'; // Rajouter un élément dans le tableau

unset ($alpha[45], $alpha[5]); // Unset permet de supprimer un élément du tableau (ici la clé 45 n'existe pas, le unset ne fait rien, il a déjà fait la vérif)


debug($alpha);

$num[] = 50;
$num[] = 26;
echo $num[1];

debug($num);

// Création d'un tableau de noms


$name = ['Jack', 'William', 'Elizabeth','Paul', 'Stephen', 'Megan'];

debug($name);

?>

<table>
    <tr>
        <th>Name</th>
    </tr>

<?php for ($index = 0; $index <count($name); $index++) : ?> <!-- Boucle for, à partir de , tant que $index < nombre de noms, on incrémente -->
    <tr>
        <td><?= $name[$index];?></td> <!-- Retourne les noms -->
    </tr>
<?php endfor; ?> <!-- fin de la boucle -->
</table>

<?php

// Les tableaux associatifs

$user = array(
    'prenom' => 'John',
    'nom' => 'Doe',
    'age' => 100,
    'adresses' => [
        '21 B Backer Street ',
        '21 Jump Street',
    ],
);

$user['pays'] = 'USA'; // insertion nouvel élément

echo $user ['prenom']. ' '. $user ['nom'];

echo $user['adresses'][1]; // Dans les tableaux multidimensionnels comme ici (l'ajout d'un tableau dans un tableau), on les ajoute les uns à la suite des autres afin d'afficher la valeur choisie

debug($user);

$store = [
    ['fruits' => array('Kiwi', 'Orange',
        'Banane', ['Fraise'=>'Gariguette'] )],
    array('legume' => ['Carotte', 58 =>'Courgette', 'Pomme de terre']),
    'boissons' => [
        'alcool' => ['Whisky', 'Bière', 12 => 'Vodka'],
        'Jus de Pomme',
        1.6 => "Jus d'Orange",
        [["De l'EAU"]],
    ],
];

echo $store ['boissons'][0]; // Renvoie jus de pomme
echo $store ['boissons']['alcool'][1]; // Renvoie Bière
echo $store [0]['fruits'][2]; // Renvoie Banane, Faire gaffe au tableau vide au début, le nom du tableau n'est pas défini (rajouter [0])
echo $store [1]['legume'][0]; // Affiche Carotte
echo $store [1]['legume'][59]; // Affiche Pomme de terre
echo $store ['boissons'][1][0][0]; // Affiche De l'EAU
echo $store [0]['fruits'][3]['Fraise']; // Affiche Gariguette
echo $store ['boissons'][1]; // Avec 1.6, il faut utiliser la valeur inférieure 1, Renvoie Jus d'orange

debug($store);

// Se déplacer dans un tableau

$etages = array(0,1,2,3,4,5);

// On déplace le curseur

next($etages); // Etage 1
next($etages); // Etage 2
prev($etages); // Etage 1
end($etages);  // Etage 5
reset($etages);// Etage 0

next($etages);

var_dump(current($etages));
var_dump(key($etages));

echo current($etages). ' '. key($etages) . '<br>';

reset ($etages);
while (key($etages) !== null) {
    echo 'Etage: ' . current($etages) . '<br>';
    next($etages);
}

$a = 5;
$b = &$a; // Avec &, on implente la même adresse mémoire entre a et b, b devient un alias de a et prend donc comme valeur 5 dans un premier temps, ensuite vu qu'on change b avec 12, a change également en 12
$b = 12;

echo $a;

$counter = 0;
$condition = true;
do {
    echo 'Voulez-vous commencer la partie ? <br>';
    if($counter === 2){
        $condition = false;
    }
    $counter++;
} while ($condition);

$countries = [
    'France',
    'Italie',
    'Espagne',
    'Pologne',
    'Suède',
    'Japon'
];

foreach ($countries as $maCle => $country) {
    echo "maCle $country";
};
?>

<select>
      <?php for ($index = 0; $index <count($countries); $index++) : ?>
       return <option ><?= $countries[$index];?></option>
      <?php endfor; ?>
</select>


<?php
function selectMenu ($value) {
echo '<select>';
      for ($index = 0; $index <count($value); $index++) :
       echo '<option >'.$value[$index].'</option>';
       endfor;
echo '</select>';
};
?>

<?php selectMenu($countries) ?>


<!-- CORRECTION -->

<select>
    <?php foreach ($countries as $value => $label) :?>
    <option value="<?= $value; ?>"><?= $label;?></option>
    <?php endforeach; ?>
</select>

<?php
    function selectHTML($data) {
    echo '<select>';
        foreach ($data as $value => $label) :
        printf('<option value="%s">%s</option>', $value, $label); // On utilise la fonction printf pour éviter la concaténation parfois compliquée, les %s vont être remplacés par $value et $label (dans l'ordre d'apparition)
        //echo '<option value="'.$value.'">'.$label.'</option>'; // Concaténation
        endforeach;
    echo '</select>';
    }
?>

<?php selectHTML($countries) ?>


<!-- TEST printf -->
<?php
printf("J'ai acheté %d pommes, le prix était de : %.2f <br>",5,60.90);
?>

<?php
function selectHTML2($data, $selected = null) { // selected va permettre de réafficher le choix de l'élément séelctonné
    $str = '<select>';
    foreach ($data as $value => $label) :
        $attr = $selected == $value ?  'selected': '';
        $str .= sprintf('<option value="%s"%s>%s</option>', $value,$attr, $label); // On utilise la concaténation . après $str, avec sprintf entre les différents éléments
    endforeach;
    $str .= '</select>';
    return $str;
}
?>

<?php echo selectHTML2($countries, 5); ?>


