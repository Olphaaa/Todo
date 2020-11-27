<?php


class Tache
{
    private $titre;
    private $description;
    private $datePrevu;
    private $dateInscrite;

    public function __construct(string $titre, String $description, $datePrevu, $dateInscrite){
        $this->titre=$titre;
        $this->description=$description;
        $this->datePrevu=$datePrevu;
        $this->dateInscrite=$dateInscrite;
    }

    /**
     * @return String
     */
    public function getTitre(): string
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
    public function getDescription(): string
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