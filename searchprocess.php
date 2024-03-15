<?php
require_once __DIR__ . '/classes/searchProduct.php';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/functions/utils.php';

$searchTerm = $_GET['search'] ?? '';
$searchCatnam = $_GET['category'] ?? '';
$searchProduct = new SearchProduct();

// Utilisation de l'opérateur de fusion null (??) pour simplifier la récupération de $searchTerm et $searchCatnam
$categoryId = $searchCatnam ?? null;

if ($searchTerm === null && $categoryId !== null) {
    // Si searchTerm est null mais categorie est défini, afficher tous les produits de la catégorie
    $results = $searchProduct->find($categoryId);
} elseif ($searchTerm !== null && $categoryId === null) {
    // Si searchCatnam est null mais searchTerm est défini, afficher seulement la carte du produit
    $results = $searchProduct->searchAll($searchTerm);
} else {
    // Sinon, effectuer la recherche normalement
    if ($categoryId !== null) {
        $results = $searchProduct->filteredSearch($searchTerm, $categoryId);
    } else {
        $results = $searchProduct->searchAll($searchTerm);
    }
}

foreach ($results as $result) {
    echo '<div class="containers category">';
    echo '<h2>' . $result['name'] . '</h2>';
    echo '<p>Prix : ' . $result['price_vat_free'] . '</p>';
    echo '<img src="' . $result['cover'] . '" alt="Image du produit">';
    echo '<p>' . $result['description'] . '</p>';
    echo '</div>';
}
require_once __DIR__ . '/layout/footer.php';

//model chat pour optinimiser la recherche afin de simplifié l'expression 
//ternaire pour la récupération de $searchTerm et $searchCatnam en utilisant l'opérateur de fusion null (??). 