<div class="w-full mb-10">
    <a class="relative cursor-pointer block" href="product.php?p=<?= $product->id ?>">
        <span class="absolute left-2 top-2 bg-slate-800 rounded-xl p-2">-<?= $product->discount ?>%</span>
        <img src="med/products/<?= $product->photo ?>" alt="<?= $product->name ?>" class="w-full aspect-square bg-white rounded-xl">
        <h3 class="text-2xl font-semibold py-2"><?= $product->name ?> </h3>
        <div class="text-yellow-500 flex items-center gap-1">
            <?php
            for ($i = 0; $i < $product->rating; $i++) {
                echo '<i class="fas fa-star"></i>';
            }
            for ($i = 0; $i < 5 - $product->rating; $i++) {
                echo '<i class="far fa-star"></i>';
            }
            ?>
        </div>
        <div class="font-semibold text-xl py-2">₹<?= $product->price * ((100 - $product->discount) / 100) ?> <span class="text-base text-gray-200 line-through ml-2">₹<?= $product->price ?></span></div>
    </a>
    <?php if (isset($_SESSION["cart"]) && in_array($product->id, $_SESSION["cart"])) : ?>
        <button class="bg-gray-600 text-white w-full py-2 rounded-xl mt-2" onclick="addToCart(<?= $product->id ?>)">Added to cart</button>
    <?php else : ?>
        <button class="bg-[#009393] text-white w-full py-2 rounded-xl mt-2 hover:bg-[#016170] cursor-pointer" onclick="addToCart(<?= $product->id ?>)">add to cart</button>
    <?php endif; ?>
</div>

<script>
    function addToCart(id) {

        fetch("add-to-cart.php?id=" + id, {
            method: "GET",
        }).then((response) => response.text()).then((data) => {
            console.log(data);
            if (data == "success") {
                window.location.reload();
            }
        });
    }
</script>