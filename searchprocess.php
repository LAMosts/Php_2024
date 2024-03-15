<?php
require_once __DIR__ . '/classes/SearchProduct.php'; // Inclusion de la classe SearchProduct
require_once __DIR__ . '/layout/header.php'; // Inclusion de l'en-tête
require_once __DIR__ . '/functions/utils.php'; // Inclusion des fonctions utilitaires

// Récupération des termes de recherche depuis l'URL
$searchTerm = $_GET['search'] ?? '';
$searchCatnam = $_GET['category'] ?? '';
$searchProduct = new SearchProduct(); // Création d'une instance de la classe SearchProduct

// Conversion de la catégorie en entier
$categoryId = !empty($searchCatnam) ? intval($searchCatnam) : null;

// Recherche des produits en fonction des termes de recherche
if ($searchTerm === '' && $categoryId !== null) {
    $results = $searchProduct->find($categoryId); // Recherche tous les produits de la catégorie
} elseif ($searchTerm !== '' && $categoryId === null) {
    $results = $searchProduct->searchAll($searchTerm); // Recherche tous les produits correspondant au terme de recherche
} else {
    if ($categoryId !== null) {
        $results = $searchProduct->filteredSearch($searchTerm, $categoryId); // Recherche filtrée par terme et catégorie
    } else {
        $results = $searchProduct->searchAll($searchTerm); // Recherche tous les produits correspondant au terme de recherche
    }
}

// Affichage des résultats
if (empty($results)) {
    // Si aucun produit n'est trouvé, afficher un message approprié
    echo '<div class="containers category">';
    echo '<h2>Catégorie : ' . htmlspecialchars($searchCatnam) . '</h2>';
    echo "<p>Aucun produit trouvé pour cette catégorie.</p>";
    echo '</div>';
} else {
    // Si des produits sont trouvés, les afficher
    foreach ($results as $result) {
        echo '<div class="containers category">';
        echo '<h2>' . htmlspecialchars($result['name']) . '</h2>';
        echo '<p>Prix : ' . htmlspecialchars($result['price_vat_free']) . '</p>';
        echo '<img src="' . htmlspecialchars($result['cover']) . '" alt="Image du produit">';
        echo '<p>' . htmlspecialchars($result['description']) . '</p>';
        echo '</div>';
    }
}

require_once __DIR__ . '/layout/footer.php'; // Inclusion du pied de page

//model chat pour optinimiser la recherche afin de simplifié l'expression 
//ternaire pour la récupération de $searchTerm et $searchCatnam en utilisant l'opérateur de fusion null (??). 