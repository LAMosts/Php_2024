<?php 
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/layout/Searchbar.php';  
require_once __DIR__ . '/classes/Categories.php'; 
?>

<h1>Catégories</h1>

<?php
    $categoriesDb = new Categories();
    $categories = $categoriesDb->findAll();
?>
<div class="carousel-container">
    <div class="carousel-wrapper">
        <?php foreach ($categories as $category) { ?>
        <div class="category-card">
            <div class="category-image">
                <?php if(isset($category['image_url'])) { ?>
                    <img src="<?php echo $category['image_url']; ?>" alt="<?php echo $category['name']; ?>">
                <?php } else { ?>
                    <img src="placeholder_image.jpg" alt="<?php echo $category['name']; ?>">
                <?php } ?>
            </div>
            <div class="category-details">
                <div class="id-name-container">
                    <div class="category-id">ID: <?php echo $category['id']; ?></div>
                    <div class="category-name"><?php echo $category['name']; ?></div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>
</div>
<?php require_once __DIR__ . '/layout/footer.php'; ?>
