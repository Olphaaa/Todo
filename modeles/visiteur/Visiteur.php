<?php


class Visiteur extends Utilisateur
{
    public function __construct($username, $passwd)
    {
        parent::__construct($username, $passwd);
    }
}