<?php  
    require_once __DIR__ . '/../classes/Categories.php'; 
    $categoriesDb = new Categories();
    $categories = $categoriesDb->findAll();

    // Fonction pour trier les catégories par ordre alphabétique
    function sortByCategoryName($a, $b) {
        return strcmp($a['name'], $b['name']);
    }

    // Tri des catégories
    usort($categories, 'sortByCategoryName');
?>

<button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover" class="text-white bg-black-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-black-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-gray-800" type="button">Categories : <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownBgHover" class="z-10 hidden w-48 bg-white rounded-lg shadow dark:bg-gray-700">
    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBgHoverButton">
      <?php foreach ($categories as $category) { ?>
      <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <input id="checkbox-item-<?php echo $category['id']; ?>" type="checkbox" value="<?php echo $category['id']; ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="checkbox-item-<?php echo $category['id']; ?>" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">
            <?php echo $category['name']; ?>
          </label>
        </div>
      </li>
      <?php } ?>
    </ul>
</div>
