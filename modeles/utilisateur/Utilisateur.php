<?php


class Utilisateur
{
    private $username; //todo ajout de username comme clé privé a la place de idUtilisateur
    private $passwd;
    //private $photoProfil; pas oblié de le faire ( peut etre trop compliqué)

    public function __construct($username,$passwd)
    {
        $this->username = $username;
        $this->passwd = $passwd;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    public function __toString(){

        return "$this->username </br>";
    }

}