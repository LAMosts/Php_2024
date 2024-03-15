<?php
require_once __DIR__ ."/classes/Users.php";

$user = new Users();
$userCount = $user->countUser();

require_once __DIR__ . '/layout/header.php'; ?>

<div class="containeur">
    <?php if ($userCount == 0) { ?>
        <h2>Inscription</h2>
        <form action="login-process.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    <?php } else { ?>
        <h2>Connexion</h2>
        <form action="login-process.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Se Connecter</button>
        </form>
    <?php } ?>
</div>

<?php require_once __DIR__ . '/layout/footer.php'; ?>
