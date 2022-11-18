<!DOCTYPE html>
<html lang="en">
<?php include '../components/admin_head.php' ?>
<?php

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);

    $rating = $_POST['rating'];
    $rating = filter_var($rating, FILTER_SANITIZE_STRING);
    $discount = $_POST['discount'];
    $discount = filter_var($discount, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $ext = explode(".", $image);
    $image_name = time() . "." . end(($ext));
    $image_folder = '../med/products/' . $image_name;

    $update_product = mysqli_safe_query("UPDATE `products` SET name = %s, description = %s, discount = %s, rating = %s, price = %s WHERE id = %s", $name, $description, $discount, $rating, $price, $_GET['update']);

    $message[] = 'product updated!';

    $old_image = $_POST['old_image'];

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'images size is too large!';
        } else {
            $update_image = mysqli_safe_query("UPDATE `products` SET photo = %s WHERE id = %s", $image_name, $_GET['update']);
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'image updated!';
        }
    }
}

?>

<body>

    <?php include '../components/admin_header.php' ?>

    <!-- update product section starts  -->

    <section class="update-product">

        <h1 class="heading">update product</h1>

        <?php
        $update_id = $_GET['update'];
        $show_products = mysqli_safe_query("SELECT * FROM `products` WHERE id = %s", $update_id);

        if (mysqli_num_rows($show_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($show_products)) {
        ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                    <input type="hidden" name="old_image" value="<?= $fetch_products['photo']; ?>">
                    <img src="../med/products/<?= $fetch_products['photo']; ?>" alt="">
                    <span>update name</span>
                    <input type="text" required placeholder="enter product name" name="name" maxlength="100" class="box" value="<?= $fetch_products['name']; ?>">
                    <span>update price</span>
                    <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="price" onkeypress="if(this.value.length == 10) return false;" class="box" value="<?= $fetch_products['price']; ?>">
                    <span>update description</span>
                    <textarea name="description" required placeholder="enter product description" class="box" maxlength="500"><?= $fetch_products['description']; ?></textarea>
                    <span>update discount</span>
                    <input type="number" min="0" max="100" required placeholder="enter product discount" name="discount" class="box" value="<?= $fetch_products['discount']; ?>">
                    <span>update rating</span>
                    <input type="number" min="0" max="5" required placeholder="enter product rating" name="rating" class="box" value="<?= $fetch_products['rating']; ?>">
                    <span>update image</span>
                    <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
                    <div class="flex-btn">
                        <input type="submit" value="update" class="btn" name="update">
                        <a href="products" class="option-btn">go back</a>
                    </div>
                </form>
        <?php
            }
        } else {
            echo '<p class="empty">no products added yet!</p>';
        }
        ?>

    </section>

    <script src="../js/admin_script.js"></script>

</body>

</html>