<?php
require_once __DIR__ . '/classes/SearchProduct.php'; 
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/functions/utils.php';

$searchTerm = $_GET['search'] ?? '';
$searchCatnam = $_GET['category'] ?? '';
$searchProduct = new SearchProduct(); 
$categoriesDb = new Categories();

$categories = $categoriesDb->findAll();

foreach ($categories as $category) {
    if ($searchTerm === '' && $searchCatnam !== '') {
        if ($searchCatnam == $category['id']) {
            $results = $searchProduct->find($searchCatnam);            
            displayProducts($results, $category);
        }
    } elseif ($searchTerm !== '' && $searchCatnam === '') {
        $searchCatnam = 0;
        $results = $searchProduct->filteredSearch($searchTerm,$searchCatnam);
        displayProducts($results, $category);
    } elseif ($searchTerm !== '' && $searchCatnam !== '') {
        if ($searchCatnam == $category['id']) {
            $results = $searchProduct->filteredSearch($searchTerm, $searchCatnam);
            displayProducts($results, $category);
        }
    } else {
        $results = $searchProduct->filteredSearch($searchTerm, $searchCatnam);
        displayProducts($results, $category);
    }
}

function displayProducts($products, $category) {
    if ($products) { 
        echo '<div class="containers">
                <div class="category">
                    <h2>' . $category['name'] . '</h2>
                    <div class="products">';
        foreach ($products as $product) {
            echo '<div class="product">
                    <img src="' . $product['cover'] . '" alt="' . $product['name'] . '">
                    <h3>' . $product['name'] . '</h3>
                    <p class="price">Prix : ' . $product['price_vat_free'] . ' €</p>
                    <p>' . $product['description'] . '</p>
                  </div>';
        }
        echo '</div>
              </div>
              </div>';
    } else {
        echo "<p>Aucun produit trouvé pour la catégorie " . $category['name'] . ".</p>"; // Message si aucun produit n'est trouvé
    }
}

require_once __DIR__ . '/layout/footer.php'; 

