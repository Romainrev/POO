<?php
/**
 * Nous sommes ici sur le point d'entrée de notre application.
 * En MVC, c'est ici ce que l'on appel : un FrontController.
 * L'ensemble des actions / requêtes de notre site internet passera uniquement par ce fichier.
 * Il a pour mission de transférer au bon controleur la demande de l'utilisateur.
 * ------
 * Dans un Framework et en MCV, nous utiliserons la puissance de la récritures des URLs via la création d'un fichier HTACCESS.
 */

# Chargement du Bootstrap
use Core\Core;

require_once 'bootstrap.php';

# Contenu de mon site
$core = new Core($_GET);

