<?php


class Utilisateur{

    private $username;
    private $passwd;

    public function __construct($username,$passwd)
    {
        $this->username= $username;
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