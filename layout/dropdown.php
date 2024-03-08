<button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-black bg-gray-700 hover:bg-black-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-white-800" type="button">Categories <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownInformation" class="z-10 hidden bg-black divide-y divide-black-100 rounded-lg shadow w-44 dark:bg-black-700 dark:divide-black-600">
    <div class="px-4 py-3 text-sm text-black-900 dark:text-black">
        <div>User</div><!-- recuperer le nom et le mail de l'utilisateur si il est co-->
        <div class="font-medium truncate">name@mail.com</div> 
    </div>
    <!-- Si connnecter affiche ca si non afficher juste home et connextion -->
    <ul class="py-2 text-sm text-black-700 dark:text-black-200" aria-labelledby="dropdownInformationButton">
      <li>
        <a href="#" >Home</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-white-100 dark:hover:bg-black-600 dark:hover:text-black">Add Category</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-black">Add Product</a>
      </li>
    </ul>
    <div class="py-2">
      <a href="#" class="block px-4 py-2 text-sm text-black-700 hover:bg-white-100 dark:hover:bg-white-600 dark:text-black-200 dark:hover:text-black">Sign out</a>
    </div>
</div>
