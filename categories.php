<?php 
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/layout/Searchbar.php'; 
require_once __DIR__ . '/classes/Database.php'; 
require_once __DIR__ . '/classes/Categories.php'; 
require_once __DIR__ . '/functions/randomImg.php'
?>


<h1>Catégories</h1>

<?php
    $categoriesDb = new Categories();
    $categories = $categoriesDb->findAll();
?>
<div class="list-container">
    <?php foreach ($categories as $category) { ?>
        <!--<a href="categories.php?id=<?php echo $category['id']; ?>" class="category-link">-->
        <a href="#" class="category-link">
            <div class="category-card">
                <div class="category-image">
                    <?php if(isset($category['image_url'])) { ?>
                        <img src="https://cdn.pixabay.com/photo/2018/02/21/05/17/cat-3169476_1280.jpg" alt="<?php echo $category['name']; ?>">
                    <?php } else { ?>
                        <img src="placeholder_image.jpg" alt="<?php echo $category['name']; ?>">
                        
                    <?php } ?>
                </div>
                <div class="category-details">
                    <div>ID : <?php echo $category['id']; ?></div>
                    <div>Nom : <?php echo $category['name']; ?></div>
                </div>
            </div>
        </a>
    <?php } ?><?php var_dump(getRandomImgUrl()); ?>
</div>






<?php require_once __DIR__ . '/layout/footer.php'; ?>