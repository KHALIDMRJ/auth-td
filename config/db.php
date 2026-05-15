<?php
$host = '127.0.0.1';
$db = 'auth_td';
$user = 'root'; // votre utilisateur MySQL
$pass = ''; // votre mot de passe MySQL
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
];
try {
$pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
error_log($e->getMessage());
die('Erreur de connexion à la base de données.');
}
?>