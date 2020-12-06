<?php


class Utilisateur
{
    private $username; //todo ajout de username comme clé privé a la place de idUtilisateur
    private $nom;
    private $prenom;
    private $passwd;
    private $listTaches;
    //private $photoProfil; pas oblié de le faire ( peut etre trop compliqué)

    public function __construct($username,$nom,$prenom,$passwd){
        $this->userName=$username;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->passwd=$passwd;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * @param mixed $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    /**
     * @return mixed
     */
    public function getListTaches()
    {
        return $this->listTaches;
    }

    /**
     * @param mixed $listTaches
     */
    public function setListTaches($listTaches)
    {
        $this->listTaches = $listTaches;
    }








    public function ajouterTacheInfos($titre,$description,$datePrevu,$dateInscrite){
        $tache=new Tache($titre,$description,$datePrevu,$dateInscrite);
        $listTaches[]=$tache;
    }

    public function ajouterTache(Tache $t){ //ajout foncitonne
        $this->listTaches[]=$t;
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