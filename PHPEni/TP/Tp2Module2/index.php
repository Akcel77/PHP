<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        //Créer un tableau multidimensionnel associatif dont les clés 
        //sont des noms de personnes et les valeurs des tableaux indicés contenant le prénom, la ville de résidence et l'âge de la personne.
        $dupont = ['gérard', 'Paris', 67];
        $badin = ['Aurelie', 'Nantes', 31];
        $users = [$dupont, $badin];
        var_dump($users);

        //Créer un tableau multidimensionnel associatif dont les clés sont des noms de personnes et les valeurs des tableaux associatifs 
        //dont les clés sont le prénom, la ville de résidence et l'âge de la personne avec une série de valeurs associées.
        $users2 = [
            "dupont" =>
            ["prénom" => "gérard", "ville de résidence" => "paris", "âge" => 67],
            "badin" =>
            ["prénom" => "aurélie", "ville de résidence" => "nantes", "âge" => 31]];         
        var_dump($users2);

       /*  Utiliser une boucle foreach pour lire les tableaux des exercices 1 et 2 et afficher les informations avec le format suivant :
            Element dupont
                élément 0 : gérard
                élément 1 : paris
                élément 2 : 67
            Element badin
                élément 0 : aurélie
                élément 1 : nantes
                élément 2 : 31 */

        //Tableau 1
        echo '<ul>';
        foreach ($users as $nom => $valeurs) {
        echo '<li>Element ' . $nom . '<ul>';
            for ($i = 0; $i < count($valeurs); $i++) {
                echo '<li>élément ' . $i . ' : ' . $valeurs[$i] . ' </li>';
            }
            echo '</ul></li>';
        }
        echo '</ul>';

        //Tableau 2
        echo '<ul>';
        foreach ($users2 as $nom => $valeurs) {
            echo "<li>Element $nom<ul>";
            foreach ($valeurs as $clé => $valeur) {
                echo "<li>$clé : $valeur</li>";
            }
            echo "</ul></li>";
        }
        echo '</ul>';


        //Créer un tableau contenant une liste d'adresses e-mail. 
        //Extraire le nom de serveur de ces données, puis réaliser des statistiques sur les occurrences de chaque fournisseur d'accès.
        $mails = ['jean@eni.fr', 'fred@linux.net', 'lea@renault.fr', 'caroline@eni.fr',
        'contact@eni-ecole.fr', 'valentina@ferrari.it', 'melanie@eni-ecole.fr',
        'philippe@eni.fr', 'typhaine@belfort.fr', 'louis@leparisien.fr'];
        foreach ($mails as $mail) {
            $domaine = explode('@', $mail)[1];
            if (isset($domaines[$domaine])) {
                $domaines[$domaine] ++;
            } else {
                $domaines[$domaine] = 1;
            }
        }
        var_dump($domaines);


        //Créer un tableau d'entiers variant de 1 à 63, puis à partir de celui ci un autre tableau de nombres variant de 0 à 6.3. 
        //Créer ensuite un tableau associatif dont les clés X varient de 0 à 6.3 et dont les valeurs sont sin(X). 
        //Afficher ce tableau dans un tableau HTML.
        for ($i = 1; $i <= 63; $i++) {
            $t1[] = $i;
         }
         $t2[] = 0;
         foreach ($t1 as $val) {
            $t2[] = $val / 10;
         }
         
         foreach ($t2 as $reel) {
            $t3[(string) $reel] = sin($reel);
         }
         
         echo '<table style="border-collapse:collapse"><tr><th style="border:1px solid black">x</th><th style="border:1px solid black">sin(x)</th></tr>';
         foreach ($t3 as $x => $sinx) {
            echo '<tr><td style="border:1px solid black">' . $x . '</td><td style="border:1px solid black">' . $sinx . '</td></tr>';
         }
         echo '</table>';
    ?>
</body>
</html>