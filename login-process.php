<?php
require_once __DIR__ ."/classes/Users.php";
require_once __DIR__ ."/functions/utils.php";

session_start(); // Démarrer la session

$user = new Users();
$userCount = $user->countUser();

$login = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($userCount == 0) {
    $user->insertUser($login, $password);
    redirect('/');
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($login) && !empty($password)) {
            
            if ($user && password_verify($password, $user->getPassword())) {
                $_SESSION['user_id'] = $login;
                redirect('/');
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect";
            }
        } else {
            $error = "Veuillez remplir tous les champs";
        }
    }
}
