<!DOCTYPE html>
<html lang="en">

<?php include "components/head.php" ?>
<?php
if (!isset($user)) {
    header("Location: login.php");
}
?>

<body class="bg-slate-900 text-white px-[calc(50vw-600px)] pt-[100px]">
    <?php include "components/header.php"; ?>
    <div class="text-5xl font-black">
        My Profile
    </div>
    <div class="bg-black/30 p-5 rounded-xl mt-10">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="">
                <i class="fad fa-user-circle text-8xl"></i>
            </div>
            <div class="">
                <div class="text-2xl font-bold">
                    <?= $user->name ?>
                </div>
                <div class="text-xl text-gray-400">
                    <?= $user->email ?>
                </div>
                <hr class="my-4 border-gray-800">
                <a href="logout.php" class="text-red-400 hover:text-red-500">
                    <i class="far fa-arrow-right-from-bracket"></i> Logout
                </a>
            </div>

        </div>
    </div>

    <div class="text-3xl font-black mt-10">
        My Orders
    </div>

    <?php
    $orders = mysqli_safe_query("SELECT * FROM orders WHERE user = %s ORDER BY time DESC", $user->id);
    if (mysqli_num_rows($orders) == 0) {
        echo "<div class='text-xl text-gray-400 mt-5'>You have no orders yet.</div>";
    } else {
        while ($order = mysqli_fetch_object($orders)) {
            $order->product = mysqli_fetch_object(mysqli_safe_query("SELECT * FROM products WHERE id = %s", $order->product));
            foreach ($order->product as $product) {
                $order->total += $product->price * $product->quantity;
            }
        }
    }
    ?>

</body>

</html>