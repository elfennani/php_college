<?php 

// J'ai utilisé PostgreSQL car c'est ce qui est disponible sur mon système.
// J'ai utilisé cet exemple de connexion: https://www.php.net/manual/en/pgsql.examples-basic.php
$dbconn = pg_connect("host=localhost port=5432 dbname=exercice user=elfennani password=");

if(!$dbconn) {
    echo "Erreur de connexion à la base de données.";
    exit;
}

// SERIAL est l'équivalent de AUTO_INCREMENT en PostgreSQL
$query = "
    CREATE TABLE IF NOT EXISTS utilisateur (
        id SERIAL PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL
    );

    CREATE TABLE IF NOT EXISTS client (
        id SERIAL PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        prenom VARCHAR(100) NOT NULL,
        sexe CHAR(1) NOT NULL,
        ville VARCHAR(100) NOT NULL,
        loisir VARCHAR(100) NOT NULL
    );
";

$result = pg_query($dbconn, $query);

session_start();