<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>
    <style>
        body {font-family: sans-serif;}
        .table {border-collapse: collapse;}
        .table, .table td {
            border: 1px solid black;
            min-width: 14px;
            padding: 4px;
            text-align: center;
        }
        .table tr:first-child {
            background-color: darkred;
            color: white;
        }
        .table tr td:first-child {
            background-color: darkred;
            color: white;
        }
        .table tr:first-child td:first-child{
             background-color: black;
             color: white;
         }
        .white {
            background-color: white;
            color: black;
        }
        .grey{
            background-color: grey;
            color: white;
        }
    </style>
</head>
<body>
<?php
    $max =10;
    $size = $_GET['taille'] ?? $max;?>
<nav>
    <?php for ($n=1; $n<=$max; $n++): ?>
    <a href="?taille=<?= $n ?>"><?= $n?></a>
    <?php endfor?>
</nav>
<table class="table">
        <tr>
            <td>X</td>
            <?php for ($l =1; $l <=$size; $l++) : ?>
            <td><?= $l; ?></td>
            <?php endfor ?>
        </tr>

    <?php for ($y=1; $y<=$size; $y++):;?>
        <tr>
            <td><?=$y;?></td>
            <?php for ($x=1; $x<=$size; $x++):;?>
            <?php $class = ($x+$y)%2 == 0 ? 'white': 'grey';?>
            <td class="<?=$class?>"><?php echo $x*$y; ?>
    <?php endfor ?></td>
    </tr>
    <?php endfor ?>
   </table>

</body>

</html>