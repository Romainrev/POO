<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/02/2018
 * Time: 11:28
 */

class Classes
{
private $NomClasses,
        $Eleves = [];

public function __construct($NomClasses)
{
    $this->NomClasses = $NomClasses;
}

    /**
     * @return mixed
     */
    public function getNomClasses()
    {
        return $this->NomClasses;
    }

    /**
     * @return array
     */
    public function getEleves(): array
    {
        return $this->Eleves;
    }

    /**
     * @param mixed $NomClasses
     */
    public function setNomClasses($NomClasses): void
    {
        $this->NomClasses = $NomClasses;
    }

    /**
     * @param array $Eleves
     */
    public function AjouterUnEleve(Eleves $Eleves): void
    {
        $this->Eleves[] = $Eleves;
    }
}