<?php

function setDB()
{
    static $pdo;
    //db est le no du service de base de données dans docker compose rootpassword  # rootpassword Mot de passe pour l'utilisateur root 
    if ($pdo === null) {
        $pdo = new PDO("mysql:host=db;dbname=php_mvc", "user", "user123");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}
