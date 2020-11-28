<?php
//chargement de la configuration
require_once('config/config.php');

//chargement autoloader pour chargemnet des classes
//a voir a quoi sert un autoload
require_once(__DIR__.'/config/Autoload.php');
Autoload::charger();

$con = new Controleur();