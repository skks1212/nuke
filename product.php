<!DOCTYPE html>
<html lang="en">

<?php include "components/head.php" ?>
<?php
$query = mysqli_safe_query("SELECT * FROM products WHERE id = %s", $_GET['p']);
$product = mysqli_fetch_object($query)
?>

<body class="bg-slate-900 text-white px-[calc(50vw-600px)] pt-[100px]">
    <?php include "components/header.php"; ?>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-10">
        <?= $product->name ?>
    </div>
</body>

</html>