<?php


class Tache
{
    private $titre;         //titre de la tache
    private $description;   //description de la tache
    private $datePrevu;     //date où la tache doit etre faite
    private $dateInscrite; //date où la tache a été crée

    public function __construct($titre,$description,$datePrevu,$dateInscrite){
        $this->titre=$titre;
        $this->description=$description;
        $this->datePrevu=$datePrevu;
        $this->dateInscrite=strtotime(date("d-m-Y"));
    }

    public function __toString(){
        return "$this->titre ($this->description) pour le ".date("d-m-Y",$this->datePrevu) . " planifié le : ".date("d-m-Y", $this->dateInscrite);
    }

    /**
     * @return mixed
     */
    public function getDateInscrite()
    {
        return $this->dateInscrite;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDatePrevu()
    {
        return $this->datePrevu;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return string
     */
    public function getIdtache()
    {
        return $this->idtache;
    }
}