<?php
require_once __DIR__ . '/layout/header.php'; // Inclusion de l'en-tête
require_once __DIR__ . '/classes/SearchProduct.php'; // Inclusion de la classe SearchProduct
require_once __DIR__ . '/classes/Categories.php'; // Inclusion de la classe Categories

$searchProduct = new SearchProduct(); // Création d'une instance de la classe SearchProduct
$categoriesDb = new Categories(); // Création d'une instance de la classe Categories
$categories = $categoriesDb->findAll(); // Récupération de toutes les catégories

?>
<div class="containers">
    <h1>Notre Magasin</h1>
    <?php 
    //$categoryId = !empty($searchCatnam) ? (int)$searchCatnam : null; // Conversion de la catégorie en entier
    foreach ($categories as $category): ?>
        <div class="category">
            <h2><?= $category['name'] ?></h2>
            <div class="products">
                <?php
                $products = $searchProduct->filteredSearch('', $category['id']);
                if ($products) { 
                    foreach ($products as $product): ?>
                        <div class="product">
                            <img src="<?= $product['cover'] ?>" alt="<?= $product['name'] ?>">
                            <h3><?= $product['name'] ?></h3>
                            <p class="price">Prix : <?= $product['price_vat_free'] ?> €</p>
                            <p><?= $product['description'] ?></p>
                        </div>
                    <?php endforeach;
                } else {
                    echo "<p>Aucun produit trouvé pour cette catégorie.</p>"; // Message si aucun produit n'est trouvé
                }
                ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php require_once __DIR__ . '/layout/footer.php'; // Inclusion du pied de page
