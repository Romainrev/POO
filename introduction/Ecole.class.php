<?php
/**
 * Création d'une classe Ecole :
 * Une Classe PHP est une entité regroupant des variables et des fonctions.
 * Chacune de ces fonctions aura accés aux variables de cette entité.
 */


class Ecole
{
    # Déclaration des proprietés de notre classe "Ecole"
    private $NomEcole,
            $AdresseEcole,
            $DirecteurEcole,
            $Classes = [];

    #Afin de pouvoir attribuer une valeur à mes différentes variables, je vais mettre en place un constructeur.

    /**
     * Ecole constructor.
     * @param $NomEcole
     * @param $AdresseEcole
     * @param $DirecteurEcole
     */
     public function __construct(
      $NomEcole,
      $AdresseEcole,
      $DirecteurEcole)

     {
         # Ici, nous allons atribuer une valeur aux proprietés de la class.
         # La valeur est passé grâce au constructeur.

         $this->NomEcole        = $NomEcole;
         $this->AdresseEcole    = $AdresseEcole;
         $this->DirecteurEcole  = $DirecteurEcole;
     }
     /* ------------------------------------------------------------ Getters */

    /**
     * @return mixed
     */
    public function getDirecteurEcole()
    {
        return $this->DirecteurEcole;
    }

    /**
     * @return mixed
     */
    public function getNomEcole()
    {
        return $this->NomEcole;
    }

    /**
     * @return mixed
     */
    public function getAdresseEcole()
    {
        return $this->AdresseEcole;
    }

    /*----------------------------------------------------------- Setters */

    /**
     * Affecter une nouvelle valeur à NomEcole
     * @param mixed $NomEcole
     */
    public function setNomEcole($NomEcole): void
    {
        $this->NomEcole = $NomEcole;
    }

    /**
     * @param mixed $AdresseEcole
     */
    public function setAdresseEcole($AdresseEcole): void
    {
        $this->AdresseEcole = $AdresseEcole;
    }

    /**
     * @param mixed $DirecteurEcole
     */
    public function setDirecteurEcole($DirecteurEcole): void
    {
        $this->DirecteurEcole = $DirecteurEcole;
    }

    /**
     * @return array
     */
    public function getClasses(): array
    {
        return $this->Classes;
    }

    /**
     * @param array $Classes
     */
    public function AjouterUneClasses(Classes $Classes): void
    {
        $this->Classes[] = $Classes;
    }
}