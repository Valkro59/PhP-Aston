<?php

function sayHello($prenom=' Charles') {
    return 'Bonjour' . $prenom;

}

$msg = sayHello( ' Spike');
echo $msg . '<br>';
echo sayHello ();

echo '<br>';

$f = function() {
    return 'Hi everyone';
};

echo $f();

$name ='Kirk';

function sayMyName(){
    global $name;
    echo $name;
}
echo '<br>';

sayMyName();

$f = function() use ($name, $msg){
    echo $name;
};

echo '<br>';

$f();

echo '<br>';

(function (){
    echo 'Je suis totalement anonyme';
})();

function changeValue(&$number){ // le & devant la variable permet de récupèrer son adresse mémoire
    ++$number;
}

function decrease(&$number){
    $number--;
}


$n =10;

changeValue($n);

echo '<br>';

echo $n;

//FILO == FIRST IN FIRST OUT
//LILO =) LAST IN LAST OUT

$arr = ['z','c','f'];
sort($arr);

var_dump($arr);

$b = 12;
$a = &$b;
$b++;
echo $a; // $a a l'adresse mémoire de $b (avec &) et le résultat affiché est donc 13

echo '<br>';

function toExec($text, $callback){ // callback pour effectuer une fonction seulement après que la précédente se soit entièrement réalisée
    echo 'Connexion en cours...';
    echo 'Connecté...';
    echo $callback($text);
}

toExec('Hello','strtolower');

toExec('Super Text', function($text){
    echo 'Le texte est: '. $text;
});

function forever($array, $callback){
    foreach ($array as $key => $value){
        $callback($key, $value);
    }
}
echo'<br>';

forever(['x','y','z'], function ($key,$value){
    printf("%s: %s", $key, $value);
});


//on peut utiliser array_map (qui ne prend pas de réfèrence) ou array_walk (qui prend une réfèrence &)
