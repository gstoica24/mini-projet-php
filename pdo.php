<?php

$host = "localhost";
$dbname = "mini-projet-php";
$username = "root";
$password = "";

// Une requête pour afficher tous les films
$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$sqlM1 = "SELECT * FROM movies WHERE  1";
$stmt = $db->prepare($sqlM1);
$stmt->execute();
$movies =  $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($movies);

//Une requête pour afficher tous les films d’horreur
$sqlM1 = "SELECT * FROM movies WHERE  genre = Horror";
$stmt = $db->prepare($sqlM1);
$stmt->execute();
$movies =  $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($movies);

//Une requête pour afficher tous les films de la réalisatrice Julia Ducournau
$sqlM1 = "SELECT * FROM movies WHERE  realisatrice_id = 2";
$stmt = $db->prepare($sqlM1);
$stmt->execute();
$movies =  $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($movies);
