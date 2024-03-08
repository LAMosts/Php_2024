<?php 
require_once __DIR__ . '/layout/header.php'; 
require_once __DIR__ . '/layout/Searchbar.php'; 
require_once __DIR__ . '/classes/Categories.php'; 

$categoriesDb = new Categories();


$categories = $categoriesDb->findAll();
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

?>

<h1>Catégories</h1>

<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <?php foreach ($categories as $index => $category) { ?>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <a href="#" class="category-link">
                    <div class="category-card">
                        <div class="category-image">
                            <?php if(isset($category['image_urlz'])) { ?>
                                <img src="<?php echo $category['image_url']; ?>" alt="<?php echo $category['name']; ?>">
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
            </div>
        <?php } ?>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <?php foreach ($categories as $index => $category) { ?>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="<?php echo ($index === 0) ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $index + 1; ?>" data-carousel-slide-to="<?php echo $index; ?>"></button>
        <?php } ?>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 dark:bg-black-800/30 group-hover:bg-black/50 dark:group-hover:bg-black-800/60 group-focus:ring-4 group-focus:ring-black dark:group-focus:ring-black-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-black dark:text-black-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 dark:bg-black-800/30 group-hover:bg-black/50 dark:group-hover:bg-black-800/60 group-focus:ring-4 group-focus:ring-black dark:group-focus:ring-black-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-black dark:text-black-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


<?php require_once __DIR__ . '/layout/footer.php'; ?>
