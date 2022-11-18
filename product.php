<!DOCTYPE html>
<html lang="en">

<?php include "components/head.php" ?>
<?php
$query = mysqli_safe_query("SELECT * FROM products WHERE id = %s", $_GET['p']);
$product = mysqli_fetch_object($query)
?>

<body class="bg-slate-900 text-white">
    <div class="px-[calc(50vw-600px)] pt-[100px]">
        <?php include "components/header.php"; ?>
        <div class="flex flex-col md:flex-row gap-10">
            <div class="w-1/2 shrink-0">
                <div style="background:url('med/products/<?= $product->photo ?>');background-position:center;background-size:cover" class="w-full aspect-square rounded-2xl">

                </div>
            </div>
            <div class="w-1/2">
                <h1 class="text-6xl font-black">
                    <?= $product->name ?>
                </h1>
                <p class="text-lg text-gray-400">
                    <?= $product->description ?>
                </p>
                <div class="text-xl font-bold mt-5 text-gray-400 line-through">
                    ₹ <?= $product->price ?>
                </div>
                <div class="text-3xl font-bold text-green-400">
                    ₹ <?= $product->price * (1 - ($product->discount / 100)) ?> <span class="text-yellow-200">(<?= $product->discount ?>% off)</span>
                </div>
                <div class="text-yellow-400 text-xl mt-4 flex gap-2">
                    <?php
                    for ($i = 0; $i < $product->rating; $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }
                    for ($i = 0; $i < 5 - $product->rating; $i++) {
                        echo '<i class="far fa-star"></i>';
                    }
                    ?>
                </div>
                <div class="text-green-400 mt-4">
                    In Stock
                </div>
                <div>
                    <?php if (isset($_SESSION["cart"]) && in_array($product->id, $_SESSION["cart"])) : ?>
                        <button class="bg-gray-600 text-white w-full py-2 rounded-xl mt-2" onclick="addToCart()">Added to cart</button>
                    <?php else : ?>
                        <button class="bg-[#009393] text-white w-full py-2 rounded-xl mt-2 hover:bg-[#016170] cursor-pointer" onclick="addToCart()">Add to cart</button>
                    <?php endif; ?>
                    <button onclick="addToCart(true)" class="bg-[#00E0C6] text-white w-full py-2 rounded-xl mt-2 hover:bg-[#016170] cursor-pointer">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
        <script>
            const addToCart = (redirect) => {
                fetch("add-to-cart?id=<?= $product->id ?>", {
                    method: "GET",
                }).then(res => res.text()).then(res => {
                    console.log(res);
                    if (res === "success") {
                        if (redirect) {
                            window.location.href = "checkout.php"
                        } else {
                            window.location.reload();
                        }
                    } else {
                        alert("Something went wrong");
                    }
                })
            }
        </script>
    </div>
</body>

</html>