<?php


# Importation de l'Autoload de Composer
use Symfony\Component\VarDumper\VarDumper;

require_once 'vendor/autoload.php';

# Contenu de Démonstration
class Contact {
    private $_firstname,
            $_lastname;

    /**
     * Contact constructor.
     * @param $_firstname
     * @param $_lastname
     */
    public function __construct($_firstname, $_lastname)
    {
        $this->_firstname = $_firstname;
        $this->_lastname = $_lastname;
    }


}

$unString = 'Une chaîne de caractère';
$unArray  = ['Clement','Hugo','Joffrey'];
$unObjet  = new Contact('Clement','Allalah');

# Test de VarDumper

VarDumper::dump($unString);
VarDumper::dump($unArray);
VarDumper::dump($unObjet);
