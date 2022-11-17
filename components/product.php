<section class="product p-[100px] px-[calc(50vw-600px)]">

    <div class="heading text-6xl font-bold text-center"> Just in </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-10">
        <?php
        $query = mysqli_safe_query("SELECT * FROM products ORDER BY time DESC LIMIT 12");
        while ($product = mysqli_fetch_object($query)) {
            include "components/item.php";
        }
        ?>
    </div>
</section>