<?php

namespace Core\Model;


class DbFactory
{
    public static function PdoFactory(){

        # Création d'un connexion PDO
        $pdo = new \PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASW);

        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        # On retourne $pdo
        return $pdo;
    }


    /**
     * Créer une instance de Idiorm ORM
     */

    public static function IdiormFactory(){
        ORM::configure('mysql:host='.DBHOST.';dbname='.DBNAME);
        ORM::configure('username', DBUSER);
        ORM::configure('password', DBPASW);

        /*
         * Configuration de la clé primaire de chaque table, nécéssaire uniquement si les clé primaire sont différentes de ID.
         * Lien vers la Doc : https://idiorm.readthedocs.io/en/latest/configuration.html
         */
        ORM::configure('id_column_overrides', array(
            'article' => 'IDARTICLE',
            'view_articles' => 'IDARTICLE',
        ));
    }
}