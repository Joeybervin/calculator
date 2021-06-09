<?php
//Vérifications avant envoie de l'input
$nb1 = filter_input(INPUT_POST, "nb1",FILTER_VALIDATE_FLOAT);
$nb2 = filter_input(INPUT_POST, "nb2",FILTER_VALIDATE_FLOAT);
$op = filter_input(INPUT_POST, "op");

$erreur = NULL;
$resultat = NULL;

//relevé des erreurs possibles + message d'erreur qui s'affiche

if ($_SERVER["REQUEST_METHOD" ] == "POST" ) {

if (!$nb1 && $nb1 !== 0.0) {
    $erreur = "Une erreur dans la première case";
}
if (!$nb2 && $nb2 !== 0.0) {
    $erreur = "Une erreur dans la seconde case";
}
if ($op == 'add') {$resultat = $nb1 + $nb2;}
elseif ($op == 'sub') {$resultat = $nb1 - $nb2;}
elseif ($op == 'mul') {$resultat = $nb1 * $nb2;}
elseif ($op == 'div') {
    if ($nb2 == 0) {$erreur = "On ne peut pas diviser par 0";}
    else {$resultat = $nb1 / $nb2;}
}
else {$erreur = "L'opération est inconnue";}
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <!--META-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 scalable=yes">

    <!--Liens CSS-->
    <!-- CSS reset-->
    <link rel="stylesheet" href="https://meyerweb.com/eric/tools/css/reset/reset.css">
    <!--CSS de landing & onboarding -->
    <link rel="stylesheet" href="calculatrice.css">

    <title>CALCULATRICE</title>

    <style>
        
    </style>

</head>
<body>

    <h1>CALCULATRICE</h1>

    <form method="POST">


        <section id="number">
            <!--Premier chiffre à entrer par l'utilisateur-->
            <label for="nb1">Nombre 1
                <input type="text" name="nb1" id="nb1">
            </label>

            

            <!--Second chiffre à entrer par l'utilisateur-->
            <label for="nb2">Nombre 2
                <input type="text" name="nb2" id="nb2">
            </label>
        </section>
        <!--Choix du type d'opération par l'utilisateur-->
        <select id="calcul" name="op">
            <option value="add"> + </option>
            <option value="sub"> - </option>
            <option value="mul"> x </option>
            <option value="div"> / </option>
        </select> <br>


        <!--Envoie du calcul-->
        <input id="boutton" type="submit" value="Calculer">
    </form>
    <br>

    <!--Pré-message si erreur-->
    <?php if (!is_null($erreur)): ?>
        <p> <span> ERREUR</span> :  <?= $erreur?></p>
    
    <!--Pré-message si tout est OK-->
    <?php elseif (!is_null($resultat)): ?>
        <p><span class="green">Résultat : </span> <?= $resultat?></p>
   <?php endif; ?>
    
</body>
</html>