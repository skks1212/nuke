<!DOCTYPE html>
<html lang="en">
<?php include '../components/admin_head.php' ?>
<?php

if (isset($_POST['update_payment'])) {
   $order_id = $_POST['order_id'];
   $status = $_POST['status'];
   mysqli_safe_query("UPDATE orders SET status = %s WHERE id = %s", $status, $order_id);
   $message[] = 'order status updated!';
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   mysqli_safe_query("DELETE FROM `orders` WHERE id = %s", $delete_id);
   $message[] = 'order deleted!';
   header("Location: orders");
}

?>

<?php

$statuses = ['processing', 'In transit', 'out for delivery', 'delivered'];
?>

<body>

   <?php include '../components/admin_header.php' ?>

   <!-- placed orders section starts  -->

   <section class="placed-orders">

      <h1 class="heading">placed orders</h1>

      <div class="box-container">

         <?php
         $select_orders = mysqli_safe_query("SELECT *,orders.time as order_time, users.id as user_id, orders.id as order_id, products.name as product_name, users.name as user_name FROM orders INNER JOIN products ON products.id = orders.product INNER JOIN users ON users.id = orders.user ORDER BY orders.time DESC");
         if (mysqli_num_rows($select_orders) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
         ?>
               <div class="box">
                  <p> user id : <span><?= $fetch_orders['user_id']; ?></span> </p>
                  <p> placed on : <span><?= $fetch_orders['order_time']; ?></span> </p>
                  <p> name : <span><?= $fetch_orders['user_name']; ?></span> </p>
                  <p> email : <span><?= $fetch_orders['email']; ?></span> </p>
                  <p> number : <span><?= $fetch_orders['phone']; ?></span> </p>
                  <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
                  <p> Product Name : <span><?= $fetch_orders['product_name']; ?></span> </p>
                  <p> Price : <span>$<?= $fetch_orders['payment']; ?>/-</span> </p>
                  <p> payment method : <span><?= $fetch_orders['payment_mode']; ?></span> </p>
                  <form action="" method="POST">
                     <input type="hidden" name="order_id" value="<?= $fetch_orders['order_id']; ?>">
                     <select name="status" class="drop-down">
                        <option value="" selected disabled><?= $statuses[$fetch_orders['status']]; ?></option>
                        <?php
                        for ($i = 0; $i < count($statuses); $i++) {
                           if ($i != $fetch_orders['status']) {
                              echo '<option value="' . $i . '">' . $statuses[$i] . '</option>';
                           }
                        }
                        ?>
                     </select>
                     <div class="flex-btn">
                        <input type="submit" value="update" class="btn" name="update_payment">
                        <a href="orders?delete=<?= $fetch_orders['order_id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
                     </div>
                  </form>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">no orders placed yet!</p>';
         }
         ?>

      </div>

   </section>

   <!-- placed orders section ends -->









   <!-- custom js file link  -->
   <script src="../js/admin_script.js"></script>

</body>

</html>