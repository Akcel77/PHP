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
        //Créer une page html contenant un formulaire comprenant un groupe de champs ayant pour titre "Adresse client".
        // Le groupe doit permettre la saisie du nom, du prénom, de l’adresse, de la ville et du code postal. 
        //Les données sont ensuite traitées par un fichier PHP séparé récupérant les données et les affichant dans un tableau HTML.

        require_once 'autoLoad.php';

        // $formulaire1 = new Form2('Adresse client', 'tp1traitement.php');
        // $formulaire1->setText('Nom', '', true, ['placeholder' => 'votre nom...',
        //                                     'title' => 'Entrez ici votre nom',
        //                                     'maxlength' => '30']);
        // $formulaire1->setText('Prénom', '', true, ['placeholder' => 'votre prénom...',
        //                                     'title' => 'Entrez ici votre prénom',
        //                                     'maxlength' => '30']);
        // $formulaire1->setText('Adresse', '', true, ['placeholder' =>
        //                                             'le numéro et nom de la rue...',
        //                                     'title' => 'Entrez ici votre adresse',
        //                                     'maxlength' => '120']);
        // $formulaire1->setText('CP', '', true, ['placeholder' => 'votre code postal...',
        //                                     'title' =>
        //                                             'Entrez ici votre code postal',
        //                                     'maxlength' => '5']);
        // $formulaire1->setText('Ville', '', true, ['placeholder' => 'votre ville...',
        //                                     'title' => 'Entrez ici votre ville',
        //                                     'maxlength' => '30']);
        // $formulaire1->setSubmit('Envoyer le formulaire');
        // echo $formulaire1->getForm();


        //Améliorer le script précédent en vérifiant la présence des données et
        //en affichant une boîte d’alerte JavaScript si l’une des données est manquante.
        echo '<script src="main.js"></script>';
        $formulaire1 = new Form2('Adresse client', 'tp1traitement.php');
        $formulaire1->setText('Nom', '', true, ['placeholder' => 'votre nom...',
                                            'title' => 'Entrez ici votre nom',
                                            'maxlength' => '30']);
        $formulaire1->setText('Prénom', '', true, ['placeholder' => 'votre prénom...',
                                            'title' => 'Entrez ici votre prénom',
                                            'maxlength' => '30']);
        $formulaire1->setText('Adresse', '', true, ['placeholder' =>
                                                    'le numéro et nom de la rue...',
                                            'title' => 'Entrez ici votre adresse',
                                            'maxlength' => '120']);
        $formulaire1->setText('CP', '', true, ['placeholder' => 'votre code postal...',
                                            'title' =>
                                                    'Entrez ici votre code postal',
                                            'maxlength' => '5']);
        $formulaire1->setText('Ville', '', true, ['placeholder' => 'votre ville...',
                                            'title' => 'Entrez ici votre ville',
                                            'maxlength' => '30']);
        $formulaire1->setSubmit('Envoyer le formulaire');
        echo $formulaire1->getForm();


        //Créer un formulaire de saisie d’adresse e-mail contenant un champ caché destiné à récupérer le type du navigateur de l’utilisateur.
        // Le code PHP affiche l’adresse mail et le nom du navigateur dans la même page après vérification de l’existence des données.
        $valider = filter_input(INPUT_POST, 'Valider', FILTER_SANITIZE_STRING);
        if (!$valider) {
            $formulaire3 = new Form2('S\'abonner', '#');
            $formulaire3->setText('E-Mail', '', true);
            $formulaire3->setInput('hidden', 'Agent', false, ['value' => $_SERVER['HTTP_USER_AGENT']]);
            $formulaire3->setSubmit('Valider');
            echo $formulaire3->getForm();
        } else {
            $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
            $agent = filter_input(INPUT_POST, 'Agent', FILTER_SANITIZE_STRING);
            echo 'e-mail : ' . $email . ' ; agent : ' . $agent;
        }

        //Créer un formulaire demandant la saisie d’un prix HT et d’un taux de TVA. Le script affiche le montant de la TVA
        // et le prix TTC dans deux zones de texte créées dynamiquement. Le formulaire maintient les données saisies.
        ?>
        <?php
            $ht = filter_input(INPUT_POST, 'HT', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $tva = filter_input(INPUT_POST, 'Taux',FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        ?>
        <form name="Prix" method="post">
        <fieldset>
            <legend>Calcul des taxes</legend>
            <label for="HT">Prix HT</label>
            <input type="number" step="0.01" name="HT"
        <?php
        if ($ht) {
            echo ' value="' . $ht . '"';
        }
        ?>> €<br>
            <label for="Taux">Taux de TVA</label>
            <input type="number" step="0.1" name="Taux"
        <?php
        if ($tva) {
            echo 'value="' . $tva . '"';
        }
        ?>> %<br>
            <input type="submit" value="Calculer" name="Calculer"><br>
                    <?php
                    if (isset($_POST['Calculer'])):
                        $MontantTVA =
                            number_format(($ht * $tva) / 100, 2, ' € ', ' ');
                        $MontantTTC =
                                number_format($ht * (1 + $tva / 100), 2, ' € ', ' ');
                        ?>
                <label for="TVA">Montant de la TVA</label>
                <input type="text" name="TVA" readonly value="<?= $MontantTVA ?>">
                <br>
                <label for="TTC">Montant TTC</label>
                <input type="text" name="TTC" readonly value="<?= $MontantTTC ?>">
                <br>
        <?php endif; ?>
        </fieldset>
        </form>
    

        <?php
        /*Dans la perspective de la création d’un site d’agence immobilière, 
        créer un formulaire comprenant trois boutons de soumission nommés « Vendre », « Acheter » et « Louer ».
        En fonction du choix effectué par le visiteur, le rediriger vers une page spécialisée correspondante.
        Il est bien à noter que ceci est un exercice pour apprendre à maîtriser les formulaires et les redirections.
        Dans « la vraie vie », il serait préférable d'utiliser une balise de lien <hypertexte></hypertexte>*/
                
        ?>
</body>
</html>