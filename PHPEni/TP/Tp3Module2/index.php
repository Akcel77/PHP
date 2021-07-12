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
        //Transformer une chaîne écrite dans des casses différentes afin que chaque mot ait son premier caractère en majuscule.
        $phrase = "bOnJoUr, jE sUiS UnE pHrAsE pOuR tEsTeR.";
        echo ucwords(strtolower($phrase)) . '<br>';

        //Formater l'affichage d'une suite de chaînes contenant des noms et prénoms en respectant les critères suivants :
        // un prénom et un nom par ligne, affichés sur 20 caractères chacun; toutes les initiales des mots doivent être alignées verticalement.
        $ursers = array(array('Axel', 'DIAGNE'), array('Axel', 'DIAGNE'), array('Axel', 'DIA GNE'));
        foreach ($ursers as $u) {
            printf("%-20s %-20s<br>", $u[0], $u[1]);
        }
        /*D'après Wikipédia, « Pour des raisons d'habitudes, d'ancienneté du principe, ou de facilité de mise en œuvre,
        de nombreux développeurs de logiciels utilisent ou ont utilisé le classement selon l'ordre des codes dans
        le codage de caractères utilisé (par exemple ASCII ou UTF-8), nommé ordre lexicographique ».
        Le problème c'est que si on trie '1abc', '2def' et '10ghi', le 10 sera entre le 1 et le 2. Ce n'est pas l'ordre naturel.
        trier un tableau suivant l'ordre naturel.
        */
        $listeCours = [
            '10-Developpement Web côté serveur avec PHP et Symfony',
            '15-Conduite et gestion de projet',
            '8-Analyse et Conception',
            '5-PL_SQL avec Oracle',
            '6-Developpement en couches avec Java SE',
            '13-Développement Web côté serveur avec JEE',
            '19-Développement d\'une application mobile avec Android',
            '20-Développement Android - Projet',
            '14-Projet 2 - Application Web',
            '2-Initiation à la programmation procédurale avec Java',
            '18-Développement Web côté serveur en ASPX',
            '9-Développement Web côté client',
            '21-Développement cross plateforme avec Xamarin',
            '7-Projet1-ClientServeur-JavaSE',
            '1-Algorithmique',
            '11-Integration Graphique',
            '16-Utiliser les frameworks pour le développement JEE',
            '12 - CMS - WordPress',
            '4-SQL avec SQL Server',
            '3-POO avec Java',
            '17-Linux  et Admin Apache'
         ];
         
         natsort($listeCours);
         echo '<ul>';
         foreach ($listeCours as $cours) {
            echo '<li>'.$cours.'</li>';
         }
         echo '</ul>';

         //Calculer votre âge à l'instant actuel à la seconde près.
         $maintenant = time();
         $naissance = mktime(10, 10, 00, 3, 6, 1990);
         echo number_format($maintenant - $naissance, 0, '.', ' ') . ' secondes vécues<br />' ;

        //À quel jour de la semaine correspondait le 25 décembre 2017 ? Afficher le résultat en français.
        switch (date('N', mktime(0, 0, 0, 12, 25, 2017))) {
            case 1 : echo 'Lundi';
                break;
            case 2 : echo 'Mardi';
                break;
            case 3 : echo 'Mercredi';
                break;
            case 4 : echo 'Jeudi';
                break;
            case 5 : echo 'Vendredi';
                break;
            case 6 : echo 'Samedi';
                break;
            case 7 : echo 'Dimanche';
                break;
        }

        /*Déterminer à quel jour de la semaine correspondront tous les 1er Mai des années comprises entre 2018 et 2037.
        Si le jour est un samedi ou un dimanche, afficher le message « Désolé ! ».
        Si le jour est un vendredi ou un lundi afficher « Week-end prolongé ! » sinon « En semaine ».*/
        echo '<br/><ul>';
        for ($i = 2018; $i <= 2037; $i++) {
            echo '<li> ' . $i . ' : ';
            switch (date('N', mktime(0, 0, 0, 5, 1, $i))) {
                case 1 :
                case 5 :
                    echo 'Week-end prolongé !';
                    break;
                case 6 :
                case 7 :
                    echo 'Désolé !';
                    break;
                default :
                    echo 'En semaine';
                    break;
            }
            echo '</li>';
        }
        echo '</ul><br/>';


        //Le jour de l’Ascension est le quarantième jour après le jour de Pâques (jour de Pâques compris dans les 40 jours). 
        //Calculer les dates de l'Ascension pour les années 2018 à 2037.
        ini_set('date.timezone', 'Europe/Paris');
        echo '<ul>';
            for ($i = 2018; $i <= 2037; $i++) {
            $paques = easter_date($i);
            $ascention = $paques + 39 * 24 * 60 * 60;
            echo '<li>' . date('d/m/Y', $ascention) . '</li>';
        }
        echo '</ul>';

        //Afficher le calendrier du mois courant de la manière suivante :
        echo '<table><tr><th colspan="7">';
        switch (date('n')) {
            case 1: echo 'Janvier';
                break;
            case 2: echo 'Février';
                break;
            case 3: echo 'Mars';
                break;
            case 4: echo 'Avril';
                break;
            case 5: echo 'Mai';
                break;
            case 6: echo 'Juin';
                break;
            case 7: echo 'Juillet';
                break;
            case 8: echo 'Août';
                break;
            case 9: echo 'Septembre';
                break;
            case 10: echo 'Octobre';
                break;
            case 11: echo 'Novembre';
                break;
            case 12: echo 'Décembre';
                break;
        }
        echo ' ' . date('Y') . '</th></tr><tr><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th></tr><tr>';
        $donnees = mktime(0, 0, 0, date('n'), 1);
        for ($i = 1; $i < date('N', $donnees); $i++) {
            echo '<td></td>';
        }
        for ($i = 1; $i <= date('t'); $i++) {
            echo '<td>' . $i . '</td>';
            if (date('N', $donnees) == 7) {
                echo '</tr><tr>';
            }
            $donnees += 60 * 60 * 24;
        }
        for ($i = date('N', $donnees); $i <= 7; $i++) {
            echo '<td></td>';
        }
        echo '</tr></table>';
    ?> 
    
</body>
</html>