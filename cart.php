<!DOCTYPE html>
<html lang="en">

<?php include "components/head.php" ?>

<body class="bg-slate-900 text-white">
    <div class="px-[calc(50vw-600px)] pt-[100px]">
        <?php include "components/header.php"; ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-10">
            <?php
            $total = 0;
            $discounted = 0;
            if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
                echo "Your cart is empty";
            } else {
                $cart = $_SESSION["cart"];
                $products = mysqli_safe_query("SELECT * FROM products WHERE id IN (" . implode(",", $cart) . ")",);
                while ($product = mysqli_fetch_assoc($products)) {
                    $product = (object)$product;
                    $total += $product->price;
                    $discounted += $product->price * (1 - ($product->discount / 100));
                    include "components/item.php";
                }

            ?>
        </div>
        Total : ₹<span class="line-through"><?= $total ?></span> ₹<span class="font-bold text-lg"><?= $discounted ?></span> <br>
        <br>
        <a href="checkout" class="bg-[#009393] text-white w-full px-4 py-2 rounded-xl mt-2 hover:bg-[#016170] cursor-pointer">
            Continue Checkout
        </a>
    <?php } ?>
    </div>
    </div>
    <?php include "components/footer.php"; ?>
</body>

</html>