<?php

//! Mettre en place une variable qui appelera notre base de données
$dsn = "mysql:dbname=php_pdo;host=localhost;charset=utf8";
//! Mettre en place une variable qui gerera le nom d'utilisateur de la base de données
$username = "root";
//! Une autre pour gérer le mot de passe de la base de données. Laisser une chaine de caractère vide si pas de mot de passe
$password = "";

//! Je mets en place une condition en try and catch qui dit que si la base de données est bien appelée alors tout va bien sinon on renoi une erreur sous forme d'exception.
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (Exception $error) {
    echo "<h1>ERREUR : Connexion impossible</h1>";
    echo "<pre>";
    print_r($error);
    echo "</pre>";
    exit();
}
