<?php
session_start();
require 'config/db.php';
$erreurs = [];
$succes = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nom = trim($_POST['nom'] ?? '');
$email = trim($_POST['email'] ?? '');
$mdp = $_POST['mot_passe'] ?? '';
$mdp2 = $_POST['mot_passe2'] ?? '';
// Validation
if (strlen($nom) < 2)
$erreurs[] = 'Le nom doit contenir au moins 2 caractères.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
$erreurs[] = 'Adresse email invalide.';
if (strlen($mdp) < 8)
$erreurs[] = 'Mot de passe trop court (min. 8 caractères).';
if ($mdp !== $mdp2)
$erreurs[] = 'Les mots de passe ne correspondent pas.';
// Email déjà utilisé ?
if (empty($erreurs)) {
$stmt = $pdo->prepare('SELECT id FROM utilisateurs WHERE email = ?');
$stmt->execute([$email]);
if ($stmt->fetch()) $erreurs[] = 'Cet email est déjà utilisé.';
}
// Insertion
if (empty($erreurs)) {
$hash = password_hash($mdp, PASSWORD_BCRYPT);
$stmt = $pdo->prepare(
'INSERT INTO utilisateurs (nom, email, mot_passe) VALUES (?, ?, ?)'
);
$stmt->execute([$nom, $email, $hash]);
$succes = true;
}
}
?>
<!DOCTYPE html>

<!--1. Écrivez le formulaire HTML avec les champs : nom, email, mot_passe, mot_passe2.-->
<!--2. Affichez les erreurs dans $erreurs sous le formulaire.-->
<!--3. Affichez un message de succès si $succes === true.-->


<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription - Auth TD</title><br>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Créer un compte</h1><br>
<?php if ($succes): ?>
<div class="succes">Compte créé avec succès ! 
<a href="login.php">Se connecter</a></div>
<?php else: ?>
<?php if (!empty($erreurs)): ?>
<div class="erreurs">
<p>Plusieurs erreurs empêchent l'inscription :</p>
<ul>
<?php foreach ($erreurs as $err): ?>
<li><?= htmlspecialchars($err) ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
<form action="registre.php" method="post">
<label>Nom complet<br>
<input type="text" name="nom" value="<?= htmlspecialchars($nom ?? '') ?>" required>
</label><br><br>
<label>Email<br>
<input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
</label><br><br>
<label>Mot de passe<br>
<input type="password" name="mot_passe" required>
</label><br><br>
<label>Confirmer le mot de passe<br>
<input type="password" name="mot_passe2" required>
</label><br><br>
<button type="submit">Créer mon compte</button>
</form>
<?php endif; ?>
<p>Déjà membre ? <a href="login.php">Se connecter</a></p>
</body>
</html>

