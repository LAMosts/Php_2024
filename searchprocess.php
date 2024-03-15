<?php
require_once __DIR__ . '/classes/SearchEngine.php';
require_once __DIR__ . '/functions/utils.php';

$searchTerm = $_GET['search'] ?? '';
$searchCatnam = $_GET['category'] ?? '';
$searchEngine = new SearchEngine();

//var_dump($searchTerm, $searchCatnam);

$categoryId = !empty($searchCatnam) ? $searchCatnam : null;

if ($categoryId !== null) {
    $results = $searchEngine->filteredSearch($searchTerm, $categoryId);
} else {
    $results = $searchEngine->searchAll($searchTerm);
}

foreach ($results as $result) {
    var_dump("Nom du produit : " . $result['name'] . "<br>");
    var_dump("Prix : " . $result['price_vat_free'] . "<br>");
}

//model chat pour optinimiser la recherche afin de simplifié l'expression 
//ternaire pour la récupération de $searchTerm et $searchCatnam en utilisant l'opérateur de fusion null (??). 