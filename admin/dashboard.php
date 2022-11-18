<!DOCTYPE html>
<html lang="en">
<?php include '../components/admin_head.php' ?>

<body>

   <?php
   include '../components/admin_header.php'
   ?>


   <section class="dashboard">

      <h1 class="heading">dashboard</h1>

      <div class="box-container">

         <div class="box">
            <h3>welcome!</h3>
         </div>

         <div class="box">
            <?php
            $select_products = mysqli_safe_query("SELECT * FROM products");
            $numbers_of_products = mysqli_num_rows($select_products);
            ?>
            <h3><?= $numbers_of_products; ?></h3>
            <p>products added</p>
            <a href="products.php" class="btn">see products</a>
         </div>


   </section>

   <script src="../js/admin_script.js"></script>

</body>

</html>