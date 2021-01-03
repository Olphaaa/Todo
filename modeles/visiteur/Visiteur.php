<?php


class Visiteur extends Utilisateur //pas utilisé
{
    public function __construct($username, $passwd)
    {
        parent::__construct($username, $passwd);
    }
}