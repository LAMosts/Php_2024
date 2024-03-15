<?php 
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/classes/SearchProduct.php'; 
require_once __DIR__ . '/classes/Categories.php'; 
?>
<div class="containers">
    <h1>Notre Magasin</h1>
    <?php 
    $searchProduct = new SearchProduct(); // Correction du nom de classe
    $categoriesDb = new Categories();
    $categories = $categoriesDb->findAll();
    foreach ($categories as $category): ?>
        <div class="category">
            <h2><?= $category['name'] ?></h2>
            <div class="products">
                <?php
                // Recherche des produits pour cette catégorie
                $products = $searchProduct->filteredSearch('',$category['id']); // Utilisation de la méthode correcte
                if ($products) { // Vérification si des produits existent
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
<?php require_once __DIR__ . '/layout/footer.php'; ?> 
