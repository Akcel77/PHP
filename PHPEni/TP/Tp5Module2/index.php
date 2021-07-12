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
        //Créer une expression rationnelle de validation d'un numéro de carte bancaire. 
        //Ce numéro est composé de seize chiffres éventuellement groupés par quatre.

        $cb = ["1234 5678 9012 3456", "1234 5678 912 3456", "1234567890123456"];
        $cbOk = "#^(\d{4}\s*){4}$#";
        foreach ($cb as $num) {
        if (preg_match($cbOk, $num)) {
            echo $num . ' est un numéro de CB correct<br>';
        } else {
            echo $num . ' n\' est pas un numéro de CB correct<br>';
            }
        }

        /* Créer une expression rationnelle de validation d'une adresse HTTP.
        Le modèle doit répondre à la définition suivante :
            Commencer par « www. »
            Être suivi par des lettres puis éventuellement un point ou un tiret suivis d'un deuxième groupe de lettres
            Se terminer par un point suivi de l'extension qui peut avoir de 2 à 4 caractères.
        Par exemple, les adresses www.machin.com ou www.machintruc.uk sont valides.
        */
        $urls = array('www.machin.com', 'www.machintruc.uk', 'ww.machin.com', 'www.machin.bidule.com', 'www.machin-b.com', 'www.machin-truc-bidule.uk', 'ww.machin-truc.com', 'www.machin.bidule.chose');

        foreach ($urls as $url) {
            if (preg_match('#^w{3}\.[a-zA-Z]+([\-\.][a-zA-Z]+)?\.[a-zA-Z]{2,4}$#', $url)) {
                echo $url . ' est une URL valide<br>';
            } else {
                echo $url . ' <- NON VALIDE !<br>';
            }
        }

        //Créer une expression rationnelle permettant de remplacer les caractères \n par la balise <br>.
        $texte = 'Fonctionnement\n\nPHP appartient à la grande famille des descendants '.
        'du C, dont la syntaxe est très proche. En particulier, sa syntaxe et '.
        'sa construction ressemblent à celles des langages Java et Perl, à '.
        'ceci près que du code PHP peut facilement être mélangé avec du code '.
        'HTML au sein d\'un fichier PHP.\nDans une utilisation destinée à '.
        'l\'internet, l\'exécution du code PHP se déroule ainsi : lorsqu\'un '.
        'visiteur demande à consulter une page de site web, son navigateur '.
        'envoie une requête au serveur HTTP correspondant. Si la page est '.
        'identifiée comme un script PHP (généralement grâce à l\'extension '.
        '.php), le serveur appelle l\'interprète PHP qui va traiter et générer '.
        'le code final de la page (constitué généralement d\'HTML ou de XHTML, '.
        'mais aussi souvent de feuilles de style en cascade et de JS). Ce '.
        'contenu est renvoyé au serveur HTTP, qui l\'envoie finalement au '.
        'client.\n\nSource : Wikipédia (https://fr.wikipedia.org/wiki/PHP)';
        echo preg_replace('#\\\n#', '<br>', $texte);

        /*Transformer un extrait d'une page Wikipédia en syntaxe WIKI en du texte au format HTML.
        La documentation de la syntaxe WIKI est disponible sur la page https://fr.wikipedia.org/wiki/Aide:Syntaxe.
        Ne se préoccuper que des éléments suivants :
            Mises en forme (gras, italique)
            Titres
            Images (pour les très forts !)
            Liens (pour les très forts également !)
        Exemple d'un extrait d'une page wikipedia (https://fr.wikipedia.org/wiki/PHP) :
        == Histoire ==
        Le langage PHP fut créé en [[1994]] par [[Rasmus Lerdorf]] pour son [[site web]]. C'était à l'origine une [[bibliothèque logicielle]] en [[C (langage)|C]] dont il se servait pour conserver une trace des visiteurs qui venaient consulter son [[Curriculum vitæ|CV]]. Au fur et à mesure qu'il ajoutait de nouvelles fonctionnalités, Rasmus a transformé la bibliothèque en une implémentation capable de communiquer avec des bases de données et de créer des applications dynamiques et simples pour le [[World Wide Web|Web]]. Rasmus décida alors en [[1995]] de publier son code, pour que tout le monde puisse l'utiliser et en profiter. PHP s'appelait alors PHP/FI (pour '''''P'''ersonal '''H'''ome '''Pa'''ge Tools/'''F'''orm '''I'''nterpreter''). En [[1997]], deux étudiants, [[Andi Gutmans]] et [[Zeev Suraski]], redéveloppèrent le cœur de PHP/FI. Ce travail aboutit un an plus tard à la version 3 de PHP, devenu alors ''PHP: Hypertext Preprocessor''. Peu de temps après, Andi Gutmans et Zeev Suraski commencèrent la réécriture du moteur interne de PHP. Ce fut ce nouveau moteur, appelé ''[[Zend Engine]]'' — le mot ''Zend'' est la contraction de '''''Ze'''ev'' et ''A'''nd'''i'' — qui servit de base à la version 4 de PHP.

        === Utilisations ===
        [[Image:Server-side websites programming languages.PNG|thumb|Répartition des langages de programmation côté serveur des sites web, le 28 avril 2016.]]
        En [[2002]], PHP est utilisé par plus de 8 millions de sites Web à travers le monde, en [[2007]] par plus de 20 millions et en 2013 par plus de 244 millions.

        */

        $texte = "== Histoire ==
        Le langage PHP fut créé en [[1994]] par [[Rasmus Lerdorf]] pour son
        [[site web]]. C'était à l'origine une [[bibliothèque logicielle]] en
        [[C (langage)|C]] dont il se servait pour conserver une trace des visiteurs qui
        venaient consulter son [[Curriculum vitæ|CV]]. Au fur et à mesure qu'il ajoutait
        de nouvelles fonctionnalités, Rasmus a transformé la bibliothèque en une
        implémentation capable de communiquer avec des bases de données et de créer des
        applications dynamiques et simples pour le [[World Wide Web|Web]]. Rasmus décida
        alors en [[1995]] de publier son code, pour que tout le monde puisse l'utiliser
        et en profiter. PHP s'appelait alors PHP/FI (pour
        '''''P'''ersonal '''H'''ome '''Pa'''ge Tools/'''F'''orm '''I'''nterpreter'').
        En [[1997]], deux étudiants, [[Andi Gutmans]] et [[Zeev Suraski]],
        redéveloppèrent le cœur de PHP/FI. Ce travail aboutit un an plus tard à la
        version 3 de PHP, devenu alors ''PHP: Hypertext Preprocessor''. Peu de temps
        après, Andi Gutmans et Zeev Suraski commencèrent la réécriture du moteur interne
        de PHP. Ce fut ce nouveau moteur, appelé ''[[Zend Engine]]'' — le mot ''Zend''
        est la contraction de '''''Ze'''ev'' et ''A'''nd'''i'' — qui servit de base à
        la version 4 de PHP.

        === Utilisations ===
        [[Image:Server-side websites programming languages.PNG|thumb|Répartition des " .
        "langages de programmation côté serveur des sites web, le 28 avril 2016.]]
        En [[2002]], PHP est utilisé par plus de 8 millions de sites Web à travers le
        monde, en [[2007]] par plus de 20 millions et en 2013 par plus de 244
        millions.";

        // conversion des gras et italiques
        $texte = preg_replace('#\'\'\'([^\']+)\'\'\'#', '<b>$1</b>', $texte);
        $texte = preg_replace('#\'\'([^\']+)\'\'#', '<i>$1</i>', $texte);

        // conversion des titres
        $texte = preg_replace_callback('#(={1,6}) (.+?) ={1,6}#', function($matches) {
        $nb = strlen($matches[1]);
        return '<h' . $nb . '>' . $matches[2] . '</h' . $nb . '>';
        }, $texte);

        // conversion des images
        $texte = preg_replace_callback('#\[\[Image:(.+?)\|.*\]\]#', function($matches) {
        $file = str_replace(' ', '_', $matches[1]);
        return '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/' . $file . '/220px-' . $file . '" alt="">';
        }, $texte);

        /* conversion des liens (version simple mais pb d'espace dans les URL)
        $texte = preg_replace('#\[\[([^\]]+?)\|([^\]]+?)\]\]#', '<a href="https://fr.wikipedia.org/wiki/$1">$2</a>', $texte);
        $texte = preg_replace('#\[\[(.+?)\]\]#', '<a href="https://fr.wikipedia.org/wiki/$1">$1</a>', $texte);
        */
        // conversion des liens
        $texte = preg_replace_callback('#\[\[([^\]]+?)\|([^\]]+?)\]\]#', function($m) {
            $lien = str_replace(' ', '_', $m[1]);
            return '<a href="https://fr.wikipedia.org/wiki/' . $lien . '">' . $m[2] . '</a>';
        }, $texte);
        $texte = preg_replace_callback('#\[\[(.+?)\]\]#', function($m) {
            $lien = str_replace(' ', '_', $m[1]);
            return '<a href="https://fr.wikipedia.org/wiki/' . $lien . '">' . $m[1] . '</a>';
        }, $texte);

        echo $texte;
    ?>
</body>
</html>