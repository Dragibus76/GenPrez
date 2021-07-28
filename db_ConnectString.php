<?php

    $serveur = 'localhost';
    // $dbname = 'genprez';
    $dbname = 'tpc';
    $db = new PDO("mysql:host=$serveur; dbname=$dbname; charset=utf8", 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));	

?>