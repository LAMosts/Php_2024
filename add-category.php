<?php
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/layout/toolbar.php'; 
require_once __DIR__ . '/functions/error.php'; 
?>
<main>
    <div style="text-align: center;">
    <form style="display: inline-block;" action="add-category-process.php" method="POST">
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name"> <!--n'oublie pas l'integrateur (name="name") !!!-->
        </div>
        <div>
            <input type="submit" value="Save">
        </div>
    </form>
</div>
</main>










<?php
require_once __DIR__ . '/layout/footer.php'; ?>