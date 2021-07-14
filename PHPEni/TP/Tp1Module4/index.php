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
    ?>
</body>
</html>