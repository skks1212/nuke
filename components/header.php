<header class="fixed inset-x-0 top-0 flex items-center justify-between py-3 px-[calc(50vw-600px)] text-[#00E0C6] z-10">
    <div class="flex items-center justify-center gap-4">
        <div class="bg-[#00E0C6] rounded-full w-[60px] h-[60px] flex items-center justify-center">
            <img src="med/logo.svg" class="w-[50px]" alt="Logo">
        </div>
        <div class="text-3xl font-bold">
            Nuke
        </div>
    </div>
    <div class="flex items-center justify-between">
        <a href="home.php" class="nav_button">
            Home
        </a>
        <a href="catalogue.php" class="nav_button">
            Catalogue
        </a>
        <a href="cart.php" class="nav_button">
            <i class="far fa-shopping-cart"></i> <?= isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : "" ?>
        </a>
        <!--<a href="#" class="nav_button">
            <i class="far fa-heart"></i>
        </a>-->
        <?php
        if (isset($user)) {
        ?>
            <a href="profile.php" class="nav_button flex items-center gap-2">
                <i class="far fa-user-circle"></i> <?php echo $user->name; ?>
            </a>
        <?php
        } else {
        ?>
            <a href="login.php" class="bg-[#009393] text-white px-4 py-2 ml-4 rounded transition-all hover:bg-[#016170]">
                Login
            </a>
        <?php
        }
        ?>


    </div>

    <script>
        tc.c(".nav_button", "p-4 hover:text-[#00E0C6] text-[#009393] transition font-bold");
        tc.c(".nav_button i", "text-xl");
    </script>
</header>