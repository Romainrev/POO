<?php

#Importation de la class Ecole
require_once 'Ecole.class.php';
require_once 'Classes.class.php';
require_once 'Eleves.class.php';
/**
 * Création d'une instance de la classe Ecole.
 * Ici, notre variable $Ecole est un Object de la classe Ecole.
 * En ce sens, elle a accés à l'ensemble des variables et fonction qui la compose.
 */

$Ecole =new Ecole(
    'WF3 Rouen',
    'Place Saint-Marc',
    'Alexandre Martini'
);

# Affichage de l'objet Ecole
//var_dump($Ecole);

# Affichage du nom Ecole
echo $Ecole->getAdresseEcole();

# Je veux changer le nom de l'école ?
$Ecole->setNomEcole('Webforce 3 Rouen ltd');
echo '<br>'.$Ecole->getNomEcole();

$Classes1 = new Classes(
    'Front'

);

echo '<br>'. $Classes1->getNomClasses();

$Classes2 = new Classes ('Back');
$Classes3 = new Classes('Fullstack');

$Eleves1 = new Eleves(
    'Revert',
    'Romain',
     25
);
echo '<br>'.$Eleves1->getNom();
echo '<br>'.$Eleves1->getPrenom();
echo '<br>'.$Eleves1->getAge();

$Eleves2 = new Eleves ( 'Allalah', 'Clément', 24);
$Eleves3 = new Eleves ( 'Lhermitte', 'Joffrey', 21);
$Eleves4 = new Eleves ( 'Ratel', 'Hugo', 23);
$Eleves5 = new Eleves ( 'Bissik', 'Jean-Marc', 25);

# On affecte nos élèves à leur classe
$Classes1->AjouterUnEleve($Eleves1);
$Classes2->AjouterUnEleve($Eleves4);
$Classes3->AjouterUnEleve($Eleves3);

echo '<pre>';
print_r($Classes1);
echo '</pre>';

echo '<pre>';
print_r($Classes2);
echo '</pre>';

echo '<pre>';
print_r($Classes3);
echo '</pre>';

# Affecter les Classes à Une Ecole
$Ecole->AjouterUneClasses($Classes1);
$Ecole->AjouterUneClasses($Classes2);
$Ecole->AjouterUneClasses($Classes3);

# Aperçu de l'école
echo '<pre>';
print_r($Ecole);
echo '</pre>';

# Afficher mes Classes et leurs Eleves
echo '<ol>';
    # Parcourir les Classes
/**
 * Je récupère toutes les classes de mon école
 */
    $lesClasses = $Ecole->getClasses();
    foreach ($lesClasses as $objClass) {
        echo '<li>';
        echo $objClass->getNomClasses();
        echo '</li>';
        echo '<ul>';
        # On récupère les étudiants de la Classe
        $lesEtudiants =$objClass->getEleves();
            foreach ($lesEtudiants as $objEtudiants){
                echo '<li>'.$objEtudiants->getNomComplet();
                echo '</li>';
            }
            echo '</ul>';

    }
    echo '</ol>';
