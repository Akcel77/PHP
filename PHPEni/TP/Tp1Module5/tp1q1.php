<?php

//Créer un script permettant d’afficher le contenu de la table modeles dans un tableau HTML.
//Les résultats doivent être triés par marque.
require_once './tp1cnx.php';
?>
<table>
   <tr>
       <th>identifiant</th>
       <th>marque</th>
       <th>modèle</th>
       <th>carburant</th>
   </tr>
   <?php
   try {
       $modeles = $pdo->query('SELECT * FROM modeles ORDER BY marque;')->fetchAll();
       foreach ($modeles as $ligne) {
           ?>
           <tr>
               <td><?= $ligne['id_modele'] ?></td>
               <td><?= $ligne['marque'] ?></td>
               <td><?= $ligne['modele'] ?></td>
               <td><?= $ligne['carburant'] ?></td>
           </tr>
           <?php
       }
   } catch (PDOException $e) {
       $msg = 'ERREUR PDO dans ' . $e->getFile() . ' : ' . $e->getLine() . ' : ' . $e->getMessage();
       die($msg);
   }
   ?>
</table>