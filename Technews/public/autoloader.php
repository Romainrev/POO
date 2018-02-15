<?php

class Autoloader {

    # La fonction static permet d'appeler une fonction sans instancier la classe correspondante. La fonction static est deconnecté de l'objet, elle appartient à la classe.
    # Les fonctions static peuvent ne peuvent appeler que les fonctions static, elles ne communiquent qu'entre elles avec le mot "self" (différent de "this").

    public static function  register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    public static function autoload($class){
   //     echo "Autoload pour :";
      // print_r($class);
        //echo '<br>';
        require PATH_ROOT . '/' . $class .'.php';
    }


}