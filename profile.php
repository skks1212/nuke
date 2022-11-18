<!DOCTYPE html>
<html lang="en">

<?php include "components/head.php" ?>
<?php
if (!isset($user)) {
    header("Location: login");
}
?>

<body class="bg-slate-900 text-white">
    <div class="px-[calc(50vw-600px)] pt-[100px]">
        <?php include "components/header.php"; ?>
        <?php
        if (isset($_GET['placed'])) {
        ?>
            <div class="bg-green-400/30 border border-green-400 text-white p-4 rounded-xl my-2 mb-4">
                Order Placed Successfully
            </div>
        <?php
        } ?>
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
                    <a href="logout" class="text-red-400 hover:text-red-500">
                        <i class="far fa-arrow-right-from-bracket"></i> Logout
                    </a>
                </div>

            </div>
        </div>

        <div class="text-3xl font-black mt-10">
            My Orders
        </div>
        <div class="mb-10">

            <?php
            $orders = mysqli_safe_query("SELECT *,orders.time as order_time FROM orders INNER JOIN products ON products.id = orders.product WHERE user = %s ORDER BY orders.time DESC", $user->id);
            if (mysqli_num_rows($orders) == 0) {
                echo "<div class='text-xl text-gray-400 mt-5'>You have no orders yet.</div>";
            } else {
                while ($order = mysqli_fetch_object($orders)) {
            ?>
                    <div class="bg-black/30 p-5 rounded-xl mt-10 flex justify-between items-center">
                        <div class="flex flex-col md:flex-row gap-4 flex-1">
                            <div class="">
                                <img src="med/products/<?= $order->photo ?>" class="w-32 h-32 object-cover rounded-xl">
                            </div>
                            <div class="">
                                <a class="text-2xl font-bold" href="<?= "product?p=" . $order->id ?>">
                                    <?= $order->name ?>
                                </a>
                                <div class="text-xl text-gray-400">
                                    ₹ <?= $order->payment ?>
                                </div>
                                <hr class="my-4 border-gray-800">
                                <div class="text-xl text-gray-400">
                                    <?= date("d/m/y h:i A", $order->order_time + 19800) ?>
                                </div>
                            </div>
                        </div>
                        <div class="px-10">
                            <div class="text-gray-500">
                                Status
                            </div>
                            <?php
                            switch ($order->status) {
                                case 0:
                                    echo "<span class='text-yellow-400'>Processing</span>";
                                    break;
                                case 1:
                                    echo "<span class='text-blue-400'>In transit</span>";
                                    break;
                                case 2:
                                    echo "<span class='text-blue-400'>Out for delivery</span>";
                                    break;

                                case 3:
                                    echo "<span class='text-green-400'>Delivered</span>";
                                    break;

                                default:
                                    break;
                            }
                            ?>

                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <?php include "components/footer.php"; ?>
</body>

</html>