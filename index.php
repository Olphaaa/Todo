<?php

//chargement autoloader pour chargemnet des classes
require_once(__DIR__.'/config/Autoload.php');
Autoload::charger(); //sert a chager tout ce qu'il y a dans les repertoirs controleur, config, et modèle

//chargement de la configuration
require_once('config/config.php');


$cont = new TacheControleur();
//$frontCont =  new FrontControleur();