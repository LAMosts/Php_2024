<footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://flowbite.com/">FlowPussy™</a>. All Kitchens Reserved.</span>
        <form action="index.php">
            <button type="submit" class="btn btn-primary">Accueil</button>
        </form>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <?php if(isset($_SESSION['user_id'])): ?>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6"><?php echo $_SESSION['user_id']; ?></a>
                </li>
            <?php else: ?>
                <li>
                    <a href="login.php" class="hover:underline me-4 md:me-6">Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</footer>
