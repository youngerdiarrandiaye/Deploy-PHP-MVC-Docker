<?php

function setDB()
{
    static $pdo;
    // Config lue depuis l'environnement.
    // Fallbacks = valeurs docker-compose local (service "db")
    // Sur OpenShift, MYSQL_HOST=mysql est injecté et prend le dessus.
    if ($pdo === null) {
        $host   = getenv('MYSQL_HOST')     ?: 'db';
        $dbname = getenv('MYSQL_DATABASE') ?: 'php_mvc';
        $user   = getenv('MYSQL_USER')     ?: 'user';
        $pass   = getenv('MYSQL_PASSWORD') ?: 'user123';

        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $user,
            $pass
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}
