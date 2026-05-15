<?php
require 'includes/auth_check.php';
require 'config/db.php';
$nom = htmlspecialchars($_SESSION['user_nom']);
?>
<!DOCTYPE html>
<html>
<body>
<h1>Bienvenue, <?= $nom ?> !</h1>
<a href="logout.php">Se déconnecter</a>
</body>
</html>