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
        /*Écrire une fonction qui prend en paramètre un nombre inférieur à 1000 ;
        tire aléatoirement des nombres inférieurs à 1000 jusqu'à tirer la valeur passée en paramètre ;
        retourne le nombre de tirages nécessaires.
        Pour tirer nombres aléatoires, PHP possède la fonction rand().*/

        function nbEssaisPour($cible) {
            $nbTentatives = 0;
            while (rand(0, 999) != $cible)
                $nbTentatives++;
            return $nbTentatives;
        }
        echo 'Nombre de tentatives pour tomber aléatoirement sur un nombre à trois ' . 'chiffres : ' . nbEssaisPour(666);

        //Écrire une fonction prenant deux entiers en paramètres. Après l'appel à cette fonction, les deux valeurs doivent être ordonnées par ordre décroissant.
        function ordonnerDesc(&$a, &$b) {
            if($a<$b) {
                $t = $a;
                $a = $b;
                $b = $t;
            }    
        }    
        $a = rand(1, 10);
        $b = rand(1, 10);            
        echo 'Initialement : ' . $a . ' ; ' . $b . '<br>';            
        ordonnerDesc($a, $b);            
        echo 'Dans l\'ordre décroissant : ' . $a . ' ; ' . $b . '<br>';

        //Écrire une fonction calculant le plus grand diviseur commun de deux nombres. L'agorithme d'Euclide permet de trouver ce nombre : Page wikipedia.
        function pgcd($a, $b) {
            ordonnerDesc($a, $b);
            do {
                $r = $a % $b;
                $a = $b;
                $b = $r;
            } while ($r !== 0);
            return $a;
        }                
        $a = rand(1, 10000);
        $b = rand(1, 10000);
        echo 'Le plus grand diviseur commun de ' . $a . ' et ' . $b . ' est ' . pgcd($a, $b) . '<br>';
        
        /* Écrire une fonction calculant les n premières lignes du triangle de Pascal (n étant passé en paramètre). Il s'agit de la suite suivante :
            1
            1  1
            1  2  1
            1  3  3  1
            1  4  6  4  1
            1  5 10 10  5  1
            ...
            La première colonne et la diagonale valent toujours 1 et chaque autre élément est égal à la somme de celui qui est au-dessus avec celui qui se trouve sur au-dessus à gauche (exemples 3=2+1 ou 6=3+3). la fonction retourne un tableau à deux dimensions contenant ces valeurs.
            Écrire une seconde fonction affichant ce triangle de Pascal.
        */
        function trianglePascal($taille) {
            $p[] = [1];
            for ($i = 1; $i < $taille; $i++) {
                $ligne[0] = 1;
                for ($j = 1; $j < $i; $j++)
                    $ligne[$j] = $p[$i - 1][$j - 1] + $p[$i - 1][$j];
                $ligne[$i] = 1;
                $p[] = $ligne;
            }
            return $p;
        }
         
        function afficherTrianglePascal($taille) {
            $pascal = trianglePascal($taille);
            $nbChiffres = floor(log10($pascal[$taille - 1][$taille / 2])) + 2;
            $format = '%' . $nbChiffres . 'd';
            echo '<pre>';
            foreach ($pascal as $ligne) {
                foreach ($ligne as $coef) {
                    printf($format, $coef);
                }
                echo '<br>';
            }
            echo '</pre>';
        }
        afficherTrianglePascal(rand(1,20));

    ?>
</body>
</html>