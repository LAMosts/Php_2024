<?php

require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/CategoryError.php';

//on verifie si on a de la donnee / validation coter serveur
//Si le tableau post n'a pas de donne on redirige silencieuseument vers l'index
if (!isset($_POST['name'])) {
    redirect('/');
}

$categoryName = trim($_POST['name']); //enleve les espaces de gauche et droite de la chaine de caractere

if(empty($categoryName)) {
    redirect('/add-category.php?error='. CategoryError::NAME_REQUIRED); //parametre get url pour message d'erreur 
}
[
    'HOST' => $host,
    'PORT'=> $portName,
    'DB_NAME'=> $serverName,
    'CHARSET'=> $charset,
    'USER' => $dbuser,
    'PASSWORD'=> $dbpass,
] = parse_ini_file(__DIR__  . '/Config/db.ini'); // lit les donnees de configuration externaliser de connexion a la BDD
//var_dump($serverName, $portName, $serverName, $charset, $dbuser, $dbpass);
$dsn = "mysql:dbname=$serverName;port=$portName;host=$host;charset=$charset";
$pdo = new PDO($dsn, $dbuser, $dbpass);

$query = "INSERT INTO category (name) VALUES (:categoryName)";
var_dump($query);

$stmt = $pdo->prepare($query);
$stmt->execute(
    ['categoryName' => $categoryName]
);  

if($stmt === false) {
    echo "Erreur lors de ma requête";
    exit;
}

redirect("add-category.php");

