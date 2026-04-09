<?php

//parametres de connexion a la base de donnee
$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME;
$param = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

//Création de l objet PDO $connexion
try {
    $connexion = new PDO($dsn, DBUSER, DBPWD, $param);
    
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : ");
}
