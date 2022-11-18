<!DOCTYPE html>
<html lang="en">

<?php include '../components/admin_head.php' ?>
<?php


if (isset($_POST['add_product'])) {

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
   $select_products = mysqli_safe_query("SELECT * FROM `products` WHERE name = %s", $name);

   if (mysqli_num_rows($select_products) > 0) {
      $message[] = 'product name already exists!';
   } else {
      if ($image_size > 2000000) {
         $message[] = 'image size is too large';
      } else {
         move_uploaded_file($image_tmp_name, $image_folder);

         $insert_product = mysqli_safe_query("INSERT INTO `products`(name, description, discount, rating, time, price, photo) VALUES(%s,%s,%s,%s,%s,%s,%s)", $name, $description, $discount, $rating, time(), $price, $image_name);
         $message[] = 'new product added!';
      }
   }
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   mysqli_safe_query("DELETE FROM `products` WHERE id = %s", $delete_id);
   header('location:products');
}

?>

<body>

   <?php include '../components/admin_header.php' ?>


   <section class="add-products">

      <form action="" method="POST" enctype="multipart/form-data">
         <h3>add products</h3>
         <input type="text" required placeholder="enter product name" name="name" maxlength="100" class="box">
         <textarea name="description" required placeholder="enter description" class="box"></textarea>
         <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="price" onkeypress="if(this.value.length == 10) return false;" class="box">
         <input type="number" min="0" max="100" required placeholder="enter discount" name="discount" class="box">
         <input type="number" min="0" max="5" required placeholder="enter rating" name="rating" class="box">
         <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
         <input type="submit" value="add product" name="add_product" class="btn">
      </form>

   </section>



   <section class="show-products" style="padding-top: 0;">

      <div class="box-container">

         <?php
         $show_products = mysqli_safe_query("SELECT * FROM `products`");

         if (mysqli_num_rows($show_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($show_products)) {
         ?>
               <div class="box">
                  <img src="../med/products/<?= $fetch_products['photo']; ?>" alt="">
                  <div class="flex">
                     <div class="price"><span>$</span><?= $fetch_products['price']; ?><span>/-</span></div>
                     <div class="description"><?= $fetch_products['description']; ?></div>
                  </div>
                  <div class="name"><?= $fetch_products['name']; ?></div>
                  <div class="flex-btn">
                     <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">update</a>
                     <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
                  </div>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>

      </div>

   </section>

   <script src="../js/admin_script.js"></script>

</body>

</html>