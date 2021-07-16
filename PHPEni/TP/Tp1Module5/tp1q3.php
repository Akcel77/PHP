<?php

//Donner la possibilité à un utilisateur de modifier les informations le concernant (données présentes dans la table proprietaires).
//Il faut bien sûr que l'utilisateur auparavant s'authentifie en indiquant son numéro d'identification et son nom de famille.
require_once 'autoLoad.php';

$f = new Form2('Accédez à vos informations', 'tp1q3pageModif.php');
$f->setInput('number', 'Numéro d\'identification');
$f->setText('Nom de famille');
$f->setSubmit('Connexion');
echo $f->getForm();

$connexion = filter_input(INPUT_POST, 'Connexion', FILTER_SANITIZE_STRING);
$nom = filter_input(INPUT_POST, 'NomDeFamil', FILTER_SANITIZE_STRING);
$id_pers = filter_input(INPUT_POST, 'NumroDiden', FILTER_VALIDATE_INT);
$ok = false;
if ($connexion && $nom && $id_pers) {
    require_once '../../2-poo/autoLoad/autoLoad.php';
    require_once './tp1cnx.php';
    $prep = $pdo->prepare
    ('SELECT * FROM proprietaires WHERE id_pers=:id_pers AND nom=:nom;');
    $prep->bindValue(':id_pers', $id_pers);
    $prep->bindValue(':nom', $nom);
    $prep->execute();
    $donnees = $prep->fetch(); 
    if ($donnees) {
        $f = new Form2('Modification de vos informations','tp1q3pageTraitement.php');
        $f->setInput
        ('hidden', 'Numéro d\'identification', true, ['value' => $id_pers]);
        $f->setText('Nom de famille', $donnees['nom']);
        $f->setText('Prénom', $donnees['prenom']);
        $f->setText('Adresse', $donnees['adresse']);
        $f->setText('Code Postal', $donnees['codepostal']);
        $f->setText('Ville', $donnees['ville']);
        $f->setSubmit('Enregistrer');
        ?>
        <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <title>TP 1 question 3</title>
            </head>
            <body>
                <h1>TP 1 : Requêter une base de données</h1>
                <h2>Page d'édition des données</h2>
                <div>
                    <?php
                        echo $f->getForm();
                        $ok = true;
                    ?>
                </div>
                <h2>Code de la page :</h2><?php highlight_file(__FILE__); ?>
            </body>
            </html>
        <?php
        }
    }
    if (!$ok) {
        header("refresh:5;url=tp1q3c.php");
        echo '<h1>echec de l\'identification !</h1>' . 'Vous allez être renvoyé sur la page d\'authentification...';
    }
    