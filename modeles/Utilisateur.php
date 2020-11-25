<?php


class Utilisateur
{
    private $nom;
    private $prenom;
    private $passwd;
    private $listTaches;
    //private $photoProfil; pas oblié de le faire ( peut etre trop compliqué)

    public function __construct($nom,$prenom,$passwd){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->passwd=$passwd;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function ajouterTacheInfos($titre,$description,$datePrevu,$dateInscrite){
        $tache=new Tache($titre,$description,$datePrevu,$dateInscrite);
        $listTaches[]=$tache;
    }

    public function ajouterTache(Tache $t){ //ajout foncitonne
        $this->listTaches[]=$t;
    }

    public function getListTaches()
    {
        return $this->listTaches;
    }

    public function getListTachesStr()
    {
        $str="";
        foreach ($this->listTaches as $key => $val)
        {
            $str=$val->getTitre();
        }
        return $str;
    }

    public function __toString(){
        $strTaches="";
        foreach ($this->listTaches as $tache)
        {
            $strTaches=$strTaches.$tache."<br/>";
        }
        return "$this->prenom $this->nom a pour taches: <br/>$strTaches";
    }

}