<?php
function getRandomImgUrl() {
    // Liste d'URLs d'images aléatoires
    $imageUrls = [
        "https://cdn.pixabay.com/photo/2018/02/21/05/17/cat-3169476_1280.jpg",
    ];

    // Sélectionne une URL d'image aléatoire
    $randomIndex = array_rand($imageUrls);
    return $imageUrls[$randomIndex];
}
