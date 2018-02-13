<?php
/**
 * Une classe abstraite ne peut pas être instanciée directement. Il faut obligatoirement l'hérité (= extends db table).
 * Toute ses propriétés ou méthodes n'ont pas été défini, il faut définir son contenu pour l'utiliser.
 * Il faut pouvoir acceder à toute les tables d'une BDD à partir de cette classe.
 */
namespace Core\Model;


abstract class DbTable
{
    # Nom de la Table
    protected $_table;

    # Clé Primaire
    protected $_primary;

    # Classe à Mapper
    protected $_classToMap;

    # Instance PDO, Object PDO, BDD
    private $_db;
}