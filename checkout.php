<!DOCTYPE html>
<html lang="en">

<?php include "components/head.php" ?>

<body class="bg-slate-900 text-white px-[calc(50vw-600px)] pt-[100px]">
    <?php include "components/header.php"; ?>
    <?php include "inc/fn/handle_checkout.php"; ?>
    <?php
    if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
        echo "Your cart is empty";
        exit;
    }
    ?>
    <div class="flex w-full flex-col md:flex-row gap-5">
        <div class="w-full">
            <form method="POST">
                <div class="text-3xl font-black">
                    Delivery Address <span class="text-sm text-gray-400">*required</span>
                </div>
                <textarea name="address" id="" required placeholder="Your address" class="bg-black/20 text-white text-base font-base resize-none w-full h-24 p-3 mt-3 rounded-xl"></textarea>
                <br><br>
                <div class="text-3xl font-black">
                    Choose payment method
                </div>
                <br><br>
                <div class="flex flex-col gap-3">
                    <div>
                        <input type="radio" name="payment" id="card" checked>
                        <label for="card">Credit/Debit Card</label>
                    </div>
                    <div>
                        <input type="radio" name="payment" id="upi" required>
                        <label for="upi">UPI</label>
                    </div>
                    <div>
                        <input type="radio" name="payment" id="netbanking">
                        <label for="netbanking">Net Banking</label>
                    </div>
                    <div>
                        <input type="radio" name="payment" id="cod">
                        <label for="cod">Cash on Delivery</label>
                    </div>
                </div>
                <br>
                <br>
                <button type="submit" class="bg-[#009393] text-white w-full px-4 py-2 rounded-xl mt-2 hover:bg-[#016170] cursor-pointer">
                    Pay
                </button>
            </form>

        </div>
        <div class="bg-black/30 rounded-xl p-4 w-full md:w-[400px] shrink-0">
            <table class="w-full">
                <thead>
                    <th>
                        No.
                    </th>
                    <th>
                        Product
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Discount
                    </th>
                    <th>
                        Final Price
                    </th>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $discounted = 0;
                    if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
                        echo "Your cart is empty";
                    } else {
                        $cart = $_SESSION["cart"];
                        $products = mysqli_safe_query("SELECT * FROM products WHERE id IN (" . implode(",", $cart) . ")");
                        $i = 0;
                        while ($product = mysqli_fetch_assoc($products)) {
                            $product = (object)$product;
                            $total += $product->price;
                            $discounted += $product->price * (1 - $product->discount / 100);
                            $i++;
                    ?>
                            <tr>
                                <td>
                                    <?= $i ?>
                                </td>
                                <td>
                                    <?= $product->name ?>
                                </td>
                                <td>
                                    <?= $product->price ?>
                                </td>
                                <td>
                                    <?= $product->discount ?>%
                                </td>
                                <td>
                                    <?= $product->price * (1 - $product->discount / 100) ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td class="font-bold">
                            Total
                        </td>
                        <td colspan="1">

                        </td>
                        <td>
                            ₹<span class="line-through"><?= $total ?></span>
                        </td>
                        <td>

                        </td>
                        <td>
                            ₹<span class="font-bold text-lg"><?= $discounted ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <br>

    <script>
        tc.c("td", "p-2");
    </script>
</body>

</html>