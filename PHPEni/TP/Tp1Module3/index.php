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
        //Écrire une classe représentant une ville.
        // Elle doit avoir les méthodes setNom() et setDépartement() et une méthode affichant « la ville X est dans le département Y ».
        // Cette classe n'a pas de constructeur.
        //Créer des instances de Ville, affecter leurs propriétés et utiliser la méthode d'affichage.

        class Ville{
            private $nom;
            private $departement;

            public function setNom($nom) {
                $this->nom = $nom;
            }
         
            public function setDepartement($departement) {
                $this->departement = $departement;
            }
         
            public function __toString() {
                return 'La ville ' . $this->nom . ' est dans le département ' . $this->departement . '<br>';
            }
        }

        $ca = new Ville;
        $ca->setNom('Carquefou');
        $ca->setDepartement('Loire Atlantique');
        echo $ca;

        $ni = new Ville;
        $ni->setNom('Niort');
        $ni->setDepartement('Les deux Sèvres');
        echo $ni;

        //Créer une autre classe représentant une ville mais sans les accesseurs et avec un constructeur à la place.
        //Réaliser les mêmes opérations de création d'instances et d'affichage.
        class VilleCtr {

            private $nom;
            private $departement;
         
            public function __construct($nom, $dept) {
                $this->nom = $nom;
                $this->departement = $dept;
            }
         
            public function __toString() {
                return 'La ville ' . $this->nom . ' est dans le département ' . $this->departement . '<br>';
            }
        }
        $sh = new VilleCtr('Saint-herblain', 'Loire-Atlantique');
        echo $sh;

        $cb = new VilleCtr('Chartres de Bretagne', 'Ille et Vilaine');
        echo $cb;

        //Créer une classe nommée VilleAvecRegion héritant de la classe Ville affichant « la ville X est dans le département Y de la région Z ».
        class VilleAvecRegion extends VilleCtr {
   
            private $region;
            
            public function __construct($nom, $dept, $region) {
                /*parent::setNom($nom);
                parent::setDepartement($dept);*/
             parent::__construct($nom, $dept);
                $this->region = $region;
            }
            
            public function __toString() {
                $recup = parent::__toString();
                $recup = substr($recup, 0, strlen($recup) - 4);
                return  $recup . ' de la région ' .
                        $this->region . '<br>';
            }
        }
                
        $lr = new VilleAvecRegion('La Roche sur Yon', 'Vendée', 'Pays de la Loire');
        echo $lr;

        $q = new VilleAvecRegion('Quimper', 'Finister', 'Bretagne');
        echo $q;

        //Modifier la classe Ville avec constructeur pour que l'on puisse connaître la ville ayant le nom le plus long.
        class VilleCtr2 {

            private $nom;
            private $departement;
            
            protected static $nomLePlusLong;
         
            public function __construct($nom, $dept) {
                if(strlen($nom)>strlen(static::$nomLePlusLong))
                    static::$nomLePlusLong = $nom;
                $this->nom = $nom;
                $this->departement = $dept;
            }
         
            public function __toString() {
                return 'La ville ' . $this->nom . ' est dans le département ' . $this->departement . '<br>';
            }
         
            public static function getNomLePlusLong() {
                return static::$nomLePlusLong;
            }
        }
        class VilleCtrAvecRegion extends VilleCtr2 {
            private $region;
            
            public function __construct($nom, $dept, $region) {
                parent::__construct($nom, $dept);
                $this->region = $region;
            }
            
            public function __toString() {
                $recup = parent::__toString();
                $recup = substr($recup, 0, strlen($recup) - 4);
                return  $recup . ' et dans la région ' .
                        $this->region . '<br>';
            }
        }
        
        $lrsy = new VilleCtr2('La Roche sur Yon', 'Vendée');
        $q  = new VilleCtr2('Quimper', 'Finister');
        $cm = new VilleCtr2('Charleville-Mézières', 'Ardennes');
        $r = new VilleCtr2('La Rochelle', 'Charentes Maritime');

        $s = new VilleCtrAvecRegion('Saint Herblain', 'Loire Atlantique', 'Pays de la Loire');

        echo 'La ville ayant le nom le plus long est : ' . VilleCtr2::getNomLePlusLong();

        /*Créer une classe nommée Form représentant un formulaire HTML. Le constructeur doit créer le code d'en-tête du formulaire en utilisant les éléments <form> et <fieldset>.
        Une méthode setText() doit permettre d'ajouter une zone de texte.
        Une méthode setSubmit() doit permettre d'ajouter un bouton d'envoi.
        Les paramètres de ces méthodes doivent correspondre aux attributs des éléments HTML correspondants.
        La méthode getForm() doit retourner tout le code HTML de création du formulaire.
        Créer des objets Form et y ajouter deux zones de texte et un bouton d'envoi. Tester l'affichage obtenu.*/

        class FormSimple {

            protected $formulaire;
         
            public function __construct($nom, $action, $methode = 'POST') {
                $this->formulaire = '<form action="' . $action . '" method="' .
                        $methode . '"><fieldset><legend>' . $nom . '</legend>';
            }
         
            public function setText($label, $nom) {
                $this->formulaire .= '<label for="' . $nom . '">' . $label . ' : </label>';
                $this->formulaire .= '<input id="' . $nom . '" name="' . $nom . '"><br>';
            }
         
            public function setSubmit($nom) {
                $this->formulaire .= '<input type="submit" name="' . $nom . '" value="' . $nom . '">';
            }
            
            public function getForm() {
                return $this->formulaire . '</fieldset></form>';
            }
         }
        class Form {

            protected $nom;
            protected $action;
            protected $methode;
            protected $inputs;
            protected $submit;
         
            public function __construct($nom, $action, $methode = 'POST') {
                $this->nom = $nom;
                $this->action = $action;
                $this->methode = $methode;
            }
         
            public function setText($label, $valeur = '', $requis = false, $attributs = array()) {
                if (!$label) {
                    throw new Exception('Le nom du champ est obligatoire', 1);
                }
                $this->inputs[] = array_merge(['type' => 'text',
                                                'name' => $label,
                                                'value' => $valeur,
                                                'requis' => $requis], $attributs);
            }
         
            public function setSubmit($value) {
                $this->submit = $value;
            }
         
            public function getForm() {
                $formulaire = '<form action="' . $this->action . '" method="' .
                        $this->methode . '"><fieldset><legend>' . $this->nom . '</legend>';
                foreach ($this->inputs as $input) {
                    $this->genereInput($input, $formulaire);
                }
                $formulaire .= '<input type="submit" name="' . $this->submit .
                        '" value="' . $this->submit . '" ></fieldset></form>';
                return $formulaire;
            }
         
            protected function genereInput($input, &$formulaire) {
                $label = $input['name'];
                // mise en forme pour l'attribut name (suppresion des caractères spéciaux et troncage à 10 caractères)
                $input['name'] = substr(preg_replace('#\W#', '', ucwords(strtolower($input['name']))), 0, 10);
                // input avec un id généré à partir du nom
                $id = 'id' . $input['name'];
                $formulaire .= '<label for="' . $id . '">' . $label . ' : </label>';
                $formulaire .= '<input id="' . $id . '"';
                // gestion de l'attribut required pour rendre obligatoire la saisie
                if ($input['requis']) {
                    $formulaire .= ' required';
                }
                unset($input['requis']);
                // création des attributs de la balise input
                foreach ($input as $attribut => $valeur) {
                    if ($valeur) {
                        $formulaire .= ' ' . $attribut . '="' . $valeur . '"';
                    }
                }
                $formulaire .='><br>';
            }
         
        }
        $form1 = new Form('Formulaire de test', '#');
        $form1->setText('nom de famille', 'Durand', true,
            ['placeholder' => 'Votre nom...',
                'title' => 'Votre nom (maximum 30 caractères)',
                'maxlength' => '30']);
        $form1->setText('prénom');
        $form1->setSubmit('Envoyer le formulaire');
        echo $form1->getForm();



       //Créer une sous-classe nommée Form2 en dérivant la classe Form de la question précédente. 
       //Cette nouvelle classe doit permettre de créer des formulaires ayant en plus des boutons radio et des cases à cocher. 
       //Elle doit donc avoir les méthodes supplémentaires qui correspondent à ces créations.
        //Créer des objets et tester le résultat. 
        class FormSimple2 extends FormSimple {
        
            public function setCheckBox($label, $nom) {
                $this->formulaire .= '<input id="' . $nom .'" name="' . $nom .'" type="checkbox">';
                $this->formulaire .= '<label for="' . $nom .'">' . $label .'</label><br>';
            }
        
            public function setRadioButton($label, $nom, $groupe) {
                $this->formulaire .= '<input id="' . $nom .'" name="' . $groupe .'" value="' . $nom .'" type="radio">';
                $this->formulaire .= '<label for="' . $nom .'">' . $label .'</label><br>';
            }
        }
        
        $formulaire1 = new FormSimple2('Formulaire de test', '#');
        $formulaire1->setCheckBox("J'accepte de recevoir de la publicité", 'pub');
        $formulaire1->setRadioButton('Féminin',  'F', 'sexe');
        $formulaire1->setRadioButton('Masculin', 'M', 'sexe');
        for ($i = 1; $i <= 5; $i++) {
        $formulaire1->setRadioButton($i . ' étoile' . ($i > 1 ? 's' : ''), $i, 'note');
        }
        $formulaire1->setSubmit('Envoyer le formulaire');
        echo $formulaire1->getForm();


        //FORM AVANCE
        class Form2 extends Form {

            public function setCheckBox($label, $coche = false, $requis = false, $attributs = array()) {
                if (!$label) {
                    throw new Exception('Le nom du champ est obligatoire', 1);
                }
                $this->inputs[] = array_merge(array('type' => 'checkbox', 'name' => $label, 'coche' => $coche,
                                            'requis' => $requis), $attributs);
            }
         
            public function setRadioButton($label, $groupe, $coche = false, $requis = false, $attributs = array()) {
                if (!$label) {
                    throw new Exception('Le nom du champ est obligatoire', 1);
                }
                if (!$groupe) {
                    throw new Exception('Le nom du groupe est obligatoire', 1);
                }
                $this->inputs[] = array_merge(array('type' => 'radio', 'groupe' => $groupe, 'name' => $label,
                                            'coche' => $coche, 'requis' => $requis), $attributs);
            }
         
            // +
            public function setInput($type, $label, $requis = false, $attributs = array()) {
                if (!$type) {
                    throw new Exception('Le type du champ est obligatoire', 1);
                }
                if (!$label) {
                    throw new Exception('Le nom du champ est obligatoire', 1);
                }
                $this->inputs[] = array_merge(array('type' => $type, 'name' => $label, 'requis' => $requis), $attributs);
            }
         
            protected function genereInput($input, &$formulaire) {
                $label = $input['name'];
                // mise en forme pour l'attribut name (suppresion des caractères spéciaux et troncage à 10 caractères)
                $input['name'] = substr(preg_replace('#\W#', '', ucwords(strtolower($input['name']))), 0, 10);
                // input avec un id généré à partir du nom
                $id = 'id' . $input['name'];
                // Les boutons radio doivent avoir le même nom au sein d'un groupe
                if (isset($input['groupe'])) {
                    if (!isset($input['value'])) {
                        $input['value'] = $input['name'];
                    }
                    $input['name'] = $input['groupe'];
                    unset($input['groupe']);
                }
                // label en premier sauf pour les checkbox, les radiobuttons et les champs cachés
                if ($input['type'] !== 'checkbox' && $input['type'] !== 'radio' && $input['type'] !== 'hidden') {
                    $formulaire .= '<label for="' . $id . '">' . $label . ' : </label>';
                }
                $formulaire .= '<input id="' . $id . '"';
                // gestion de l'attribut required pour rendre obligatoire la saisie
                if ($input['requis']) {
                    $formulaire .= ' required';
                }
                unset($input['requis']);
                // gestion de l'attribut checked pour les cases déjà cochées
                if (isset($input['coche'])) {
                    if ($input['coche']) {
                        $formulaire .= ' checked';
                    }
                    unset($input['coche']);
                }
                // création des attributs de la balise input
                foreach ($input as $attribut => $valeur) {
                    if ($valeur) {
                        $formulaire .= ' ' . $attribut . '="' . $valeur . '"';
                    }
                }
                $formulaire .='>';
                // label après pour les checkbox et les radiobuttons
                if ($input['type'] === 'checkbox' || $input['type'] === 'radio') {
                    $formulaire .= '<label for="' . $id . '"> ' . $label . '</label>';
                }
                if ($input['type'] !== 'hidden')
                    $formulaire .='<br>';
            }
         
        }
        

        $formulaire1 = new Form2('Formulaire de test', '#');
        $formulaire1->setText('date de naissance', '17/12/1989', true,
            array('placeholder' => 'jj/mm/aaaa',
                'title' => 'Votre date de naissance (jj/mm/aaaa)',
                'maxlength' => '10'));
        $formulaire1->setInput('password', 'Mot de passe', true);
        $formulaire1->setInput('file', 'Photo');
        $formulaire1->setCheckBox("J'accepte de recevoir de la publicité", true);
        $formulaire1->setRadioButton('Féminin', 'sexe');
        $formulaire1->setRadioButton('Masculin', 'sexe');
        for ($i = 1; $i <= 5; $i++) {
        $formulaire1->setRadioButton($i . ' étoile' . ($i > 1 ? 's' : ''), 'note',
                false, true, array('value' => $i));
        }
        $formulaire1->setSubmit('Envoyer le formulaire');
        echo $formulaire1->getForm();


        /*Créer une classe abstraite représentant une personne. Elle déclare les propriétés nom et prenom et un constructeur.
        Créer une classe Client dérivée de la classe Personne en y ajoutant la propriété adresse, une méthode setcoord() 
        et la méthode __toString() qui retourne les coordonnées complètes de la personne.
        Créer une classe Electeur dérivée de la même classe abstraite et y ajouter deux propriétés bureau_de_vote et
        vote ainsi qu'une méthode avote() qui enregistre que la personne a voté dans la propriété vote.*/

        abstract class Personne {

            protected $nom;
            protected $prenom;
         
            public function __construct($nom, $prenom) {
                $this->nom = $nom;
                $this->prenom = $prenom;
            }
        }

         class Client extends Personne {

            private $adresse;
         
            public function setCoord($adresse) {
                $this->adresse = $adresse;
            }
         
            public function __toString() {
                return '<address>' . $this->nom . ' ' . $this->prenom . '<br>' . $this->adresse . '</address>';
            }
        }

         class Electeur extends Personne {

            private $bureau_de_vote;
            private $vote;
         
            public function aVote() {
                $this->vote = true;
            }
         
            public function __construct($nom, $prenom, $numBureau) {
                parent::__construct($nom, $prenom);
                $this->bureau_de_vote = $numBureau;
                $this->vote = false;
            }
         
            public function __toString() {
                return $this->nom . ' ' . $this->prenom .
                        ' (Bureau n°' . $this->bureau_de_vote . ') ' .
                        ($this->vote ? 'a déjà' : 'n\'a pas') . ' voté<br>';
            }
         
        }

        $c1 = new Client('Malalaniche', 'Mélanie');
        $c1->setCoord('34 rue de la clinique vétérinaire');
        echo $c1;

        $e1 = new Electeur('Bosapin', 'Edmond', '103');
        echo $e1;
        echo 'appel à la méthode de vote<br>';
        $e1->aVote();
        echo $e1;


    ?>
</body>
</html>