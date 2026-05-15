<?php
session_start();
require 'config/db.php';
$erreur = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$email = trim($_POST['email'] ?? '');
$mdp = $_POST['mot_passe'] ?? '';
$stmt = $pdo->prepare(
'SELECT id, nom, mot_passe FROM utilisateurs WHERE email = ?'
);
$stmt->execute([$email]);
$user = $stmt->fetch();
if ($user && password_verify($mdp, $user['mot_passe'])) {
session_regenerate_id(true); // Protection fixation de session
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_nom'] = $user['nom'];
header('Location: dashboard.php');
exit;
} else {
$erreur = 'Email ou mot de passe incorrect.'; // Message volontairementvague
}
}
?>