<?php

class Tache
{
    private $titre;
    private $description;
    private $datePrevu;
    private $dateInscrite;

    public function __construct( $titre, $description,$datePrevu, $dateInscrite){
        $this->titre=$titre;
        $this->description=$description;
        $this->datePrevu=$datePrevu;
        $this->dateInscrite=$dateInscrite;
        //todo Ajouter username correpondant a la tache | NULL si tache publique (pas d'utilisateur)
    }

    /**
     * @return String
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getDatePrevu()
    {
        return $this->datePrevu;
    }

    /**
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDateInscrite()
    {
        return $this->dateInscrite;
    }

}