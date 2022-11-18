<!DOCTYPE html>
<html lang="en">

<?php include "components/head.php" ?>

<body class="bg-slate-900 text-white">
    <div class="px-[calc(50vw-600px)] pt-[100px]">
        <?php include "components/header.php"; ?>
        <div class="text-5xl font-black">
            Catalogue
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-10">
            <?php
            $query = mysqli_safe_query("SELECT * FROM products");
            while ($product = mysqli_fetch_object($query)) {
                include "components/item.php";
            }
            ?>
        </div>

    </div>
    <?php include "components/footer.php"; ?>
</body>

</html>