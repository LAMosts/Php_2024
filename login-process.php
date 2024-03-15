<?php
require_once __DIR__ ."/classes/Users.php";

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête SQL pour récupérer le hash du mot de passe associé à l'email
    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // L'utilisateur est authentifié avec succès
        // Vous pouvez démarrer une session, rediriger vers une page sécurisée, etc.
        echo "Connexion réussie!";
        // Redirection vers une page sécurisée
        header("Location: dashboard.php");
        exit();
    } else {
        // Identifiants invalides
        $error = "Email ou mot de passe incorrect";
    }
}
