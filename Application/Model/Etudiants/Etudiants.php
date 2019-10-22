<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 17/09/2019
 * Time: 15:56
 */

class Etudiants
{
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    public $nom;
    public $prenom;
    public $classe;
    public $codePersonnalite;
    public $subCodePersonnalite;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Etudiants
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return Etudiants
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     * @return Etudiants
     */
    public function setClasse($classe): self
    {
        $this->classe = $classe;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodePersonnalite()
    {
        return $this->codePersonnalite;
    }

    /**
     * @param mixed $codePersonnalite
     * @return Etudiants
     */
    public function setCodePersonnalite($codePersonnalite): self
    {
        $this->codePersonnalite = $codePersonnalite;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubCodePersonnalite()
    {
        return $this->subCodePersonnalite;
    }

    /**
     * @param mixed $subCodePersonnalite
     * @return Etudiants
     */
    public function setSubCodePersonnalite($subCodePersonnalite): self
    {
        $this->subCodePersonnalite = $subCodePersonnalite;
        return $this;
    }

}